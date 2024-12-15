<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $restaurants = Restaurant::with('menus')->get(); // Mengambil semua restoran beserta menu terkait
        return view('your-view', compact('restaurants')); // Kirim data ke view
    }
    
    public function showOrderStatus()
{
    $orders = Order::all(); // Ganti dengan query yang sesuai jika ada filter
    $totalPrice = $orders->sum('price');
    $totalItems = $orders->count();

    return view('orderstatus', compact('orders', 'totalPrice', 'totalItems'));
}
public function deleteOrder($id)
{
    $order = Order::find($id);
    if ($order) {
        $order->delete();
        
        $totalItems = Order::sum('quantity');
        $totalPrice = Order::sum(function ($order) {
            return $order->price * $order->quantity;
        });

        return response()->json([
            'success' => true,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    return response()->json(['success' => false], 400);
}

}
