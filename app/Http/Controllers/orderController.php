<?php

namespace App\Http\Controllers;

use App\Models\deliveryStatus;
use App\Models\OrderDetail;
use App\Models\orderUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showOrders()
    {
        $userID = Auth::id();

        $orderUsers = orderUser::where('user_id', $userID)
            ->get(['id', 'total_price', 'is_payment_status']);

        $orderDetails = OrderDetail::whereIn('order_user_id', $orderUsers->pluck('id')->toArray())
            ->get();

        $deliveryStatuses = DeliveryStatus::all()->keyBy('id');

        $orderDetails->transform(function ($orderDetail) use ($deliveryStatuses) {
            if (isset($deliveryStatuses[$orderDetail->delivery_status_id])) {
                $orderDetail->delivery_status_name = $deliveryStatuses[$orderDetail->delivery_status_id]->status_name;
            }
            return $orderDetail;
        });

        $groupedOrderDetails = $orderDetails->groupBy('order_user_id');

        $finalOrders = $orderUsers->map(function ($orderUser) use ($groupedOrderDetails) {
            $orderUser->orderDetails = $groupedOrderDetails[$orderUser->id] ?? [];
            return $orderUser;
        });

        return view('orderstatus', compact('finalOrders'));
    }

    public function showCart()
    {
        $cart = session('cart', []);
        $totalItems = collect($cart)->sum('quantity');
        $totalPrice = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('cart', compact('cart', 'totalItems', 'totalPrice'));
    }


    public function updateCart(Request $request)
    {
        $cart = session('cart', []);

        $cart[$request->id] = [
            'menu_date_id' => $request->menuDate_id, // Save the menu_date_id
            'name' => $request->name,
            'price' => $request->price,
            'images' => $request->images,
            'quantity' => $request->quantity,
        ];

        session(['cart' => $cart]);

        return response()->json(['cart' => $cart, 'message' => 'Item added to cart successfully!']);
    }


    public function removeCartItem(Request $request)
    {
        $cart = session('cart', []);

        // Check if the item exists in the cart
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]); // Remove the item from the cart
            session(['cart' => $cart]); // Update the session with the new cart

            return response()->json(['cart' => $cart, 'message' => 'Item removed successfully.']);
        }

        return response()->json(['message' => 'Item not found in the cart.'], 404);
    }


    public function orderStatus($order_id)
    {
        // Ambil data order dari tabel `orderUser`
        $order = orderUser::table('orderUser')->where('id', $order_id)->first();

        // Ambil data detail order dari tabel `orderDetail`
        $orderDetails = orderUser::table('orderDetail')
            ->join('menuDate', 'orderDetail.menuDate_id', '=', 'menuDate.id')
            ->where('orderDetail.orderUser_id', $order_id)
            ->select('orderDetail.*', 'menuDate.name as menu_name')
            ->get();

        return view('order_status', compact('order', 'orderDetails'));
    }


    public function confirmPayment()
    {
        // Get cart items from session
        $cart = session()->get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty',
            ], 400);
        }

        try {
            // Calculate total price from cart items
            $totalPrice = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            // Create new order
            try {
                $order = OrderUser::create([
                    'user_id' => Auth::id(),
                    'total_price' => $totalPrice,
                    'date' => now(),
                    'is_payment_status' => false, // Set initial payment status as unpaid
                ]);
            } catch (\Exception $e) {
                Log::error('Order creation failed: ' . $e->getMessage());

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create order. Please try again.' + $e,
                ], 500);
            }

            // Create order details for each cart item
            foreach ($cart as $item) {
                OrderDetail::create([
                    'order_user_id' => $order->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'unit' => $item['quantity'],
                    'delivery_status_id' => 2, // Set initial delivery status
                ]);
            }

            // Clear the cart after successful order creation
            session()->forget('cart');

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully!',
                'redirect' => route('orderstatus')
            ]);
        } catch (\Exception $e) {
            Log::error('Order creation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to process order. Please try again.' . $e->getMessage(),
            ], 500);
        }
    }
}
