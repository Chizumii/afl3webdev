<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\orderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showOrders()
    {
        $userId = Auth::id();
    
        $orders = OrderUser::with(['orderDetails.menuDates.menu', 'orderDetails.deliveryStatuses'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'date' => $order->date,
                    'totalPrice' => $order->totalPrice,
                    'paymentStatus' => $order->isPaymentStatus,
                    'items' => $order->orderDetails->map(function ($detail) {
                        return [
                            'menu_name' => $detail->menuDates->menu->menu_name,
                            'price' => $detail->price,
                            'quantity' => $detail->unit,
                            'subtotal' => $detail->price * $detail->unit,
                            'deliveryStatus' => $detail->deliveryStatuses->status_name ?? 'Pending'
                        ];
                    })
                ];
            });
    
        return view('orderstatus', compact('orders'));
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

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
        }

        session(['cart' => $cart]);

        return response()->json(['cart' => $cart]);
    }
    public function confirmPayment(Request $request)
{
    $cart = session('cart', []);
    
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    try {
        DB::transaction(function () use ($cart) {
            // Create the order user record first
            $orderUser = orderUser::create([
                'user_id' => Auth::id(),
                'totalPrice' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
                'date' => now(),
                'isPaymentStatus' => true
            ]);

            // Create order details for each cart item
            foreach ($cart as $cartItem) {
                OrderDetail::create([
                    'menuDate_id' => $cartItem['menu_date_id'],
                    'price' => $cartItem['price'],
                    'unit' => $cartItem['quantity'],
                    'deliveryStat_id' => 1, // Initial delivery status
                    'orderUser_id' => $orderUser->id
                ]);
            }
        });

        // Clear the cart after successful order
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error processing your order. Please try again.'
        ], 500);
    }
}
    
}
