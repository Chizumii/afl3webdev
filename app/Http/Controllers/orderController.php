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
        $cart = session('cart', []); // Retrieve cart data from session
        Log::info('Cart data:', $cart);

        if (empty($cart)) {
            Log::warning('Cart is empty during confirmPayment.');
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Insert data into `orderUser`
        $orderId = orderUser::table('orderUser')->insertGetId([
            'user_id' => Auth::id(),
            'totalPrice' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'date' => now(),
            'isPaymentStatus' => true,
        ]);
        Log::info('Order ID created:', ['order_id' => $orderId]);

        // Insert data into `orderDetail`
        foreach ($cart as $cartItem) {
            orderUser::table('orderDetail')->insert([
                'orderUser_id' => $orderId,
                'menuDate_id' => $cartItem['menu_date_id'],
                'price' => $cartItem['price'],
                'unit' => $cartItem['quantity'],
                'deliveryStat_id' => 1,
            ]);
            Log::info('Inserted orderDetail for order ID:', ['order_id' => $orderId, 'cartItem' => $cartItem]);
        }

        // Forget session cart
        session()->forget('cart');
        Log::info('Cart cleared from session.');

        return redirect()->route('order.status', ['order_id' => $orderId]);
    } catch (\Exception $e) {
        Log::error('Error in confirmPayment:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}

    
}
