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

    $orderDetails = OrderDetail::with(['menuDates.menus', 'orderUsers', 'deliveryStatuses'])
        ->whereHas('orderUsers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->get()
        ->map(function ($orderDetail) {
            return [
                'id' => $orderDetail->id,
                'paymentStatus' => $orderDetail->orderUsers->isPaymentStatus ?? false,
                'deliveryStatus' => $orderDetail->deliveryStatuses->status_name ?? 'Status Not Found',
                'price' => $orderDetail->price,
                'unit' => $orderDetail->unit,
                'date' => $orderDetail->orderUsers->date ?? null,
                'totalPrice' => $orderDetail->price * $orderDetail->unit,
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
                'menu_date_id' => $cartItem['menu_date_id'],
                'price' => $cartItem['price'], 
                'deliveryStat_id' => 1,
                'unit' => $cartItem['quantity'],
                'user_id' => Auth::id()
            ]);
        }
    
        // Clear the cart after saving
        session()->forget('cart');
    
        return redirect()->route('orderstatus')
            ->with('success', 'Payment confirmed! Your order has been placed.');
    }
    
}
