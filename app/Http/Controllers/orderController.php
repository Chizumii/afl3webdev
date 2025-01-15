<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showOrders()
    {
        $userId = Auth::id();

        // Fetch order details
        $orderDetails = OrderDetail::with(['menuDates.menus', 'orderUsers', 'deliveryStatuses'])
            ->whereHas('orderUsers', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get()
            ->map(function ($orderDetail) {
                $paymentStatus = $orderDetail->orderUsers->isPaymentStatus ?? false;
                $deliveryStatus = $orderDetail->deliveryStatuses->status_name ?? 'Status Not Found';

                return [
                    'id' => $orderDetail->id,
                    'paymentStatus' => $paymentStatus,
                    'deliveryStatus' => $deliveryStatus,
                    'price' => $orderDetail->price,
                    'unit' => $orderDetail->unit,
                    'date' => $orderDetail->orderUsers->date ?? null,
                    'totalPrice' => $orderDetail->price * $orderDetail->unit,
                ];
            });

        // Fetch cart data
        $cart = session('cart', []);

        // Pass both orderDetails and cart data to the view
        return view('orderstatus', compact('orderDetails', 'cart'));
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

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = (int) $request->quantity;
        }

        session(['cart' => $cart]);

        return response()->json(['cart' => $cart]);
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

        // Process cart data to save in the database
        foreach ($cart as $cartItem) {
            OrderDetail::create([
                'menu_date_id' => $cartItem['menu_date_id'], // Replace with the correct foreign key field
                'price' => $cartItem['price'],
                'unit' => $cartItem['quantity'],
                'user_id' => Auth::id(), // Add the user ID
            ]);
        }

        // Clear the cart after saving
        session()->forget('cart');

        return redirect()->route('orderstatus')->with('success', 'Payment confirmed! Your order has been placed.');
    }
}
