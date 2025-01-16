<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\orderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = session()->get('orders', []);

        $orderDetails = collect($orders)->map(function ($order) {
            return [
                'orderID' => uniqid(),
                'paymentStatus' => true,
                'deliveryStatus' => 'Pending',
                'date' => $order['date'],
                'unit' => collect($order['items'])->sum('quantity'),
                'price' => $order['totalPrice'] / collect($order['items'])->sum('quantity'),
                'totalPrice' => $order['totalPrice'],
                'items' => collect($order['items'])->map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price']
                    ];
                })->values()->all()
            ];
        });

        return view('orderstatus', compact('orderDetails'));
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

    public function confirmPayment(Request $request)
    {
        try {
            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your cart is empty.'
                ], 400);
            }

            // Create order data structure
            $order = [
                'items' => $cart,
                'totalPrice' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
                'date' => now()->format('Y-m-d H:i:s'),
                'status' => 'pending'
            ];

            // Get existing orders or initialize empty array
            $orders = session()->get('orders', []);

            // Add new order to orders array
            $orders[] = $order;

            // Store in session
            session()->put('orders', $orders);

            // Clear the cart
            session()->forget('cart');

            return response()->json([
                'success' => true,
                'message' => 'Order confirmed successfully!',
                'redirect' => route('orderstatus')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error processing your order. Please try again.'
            ], 500);
        }
    }
}
