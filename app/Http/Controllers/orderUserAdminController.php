<?php

namespace App\Http\Controllers;

use App\Models\orderUser;
use App\Models\User;
use Illuminate\Http\Request;

class orderUserAdminController extends Controller
{
    public function index()
    {
        $orders = orderUser::with('users')->get();
        return view('orderUserAdmin', [
            'AllOrderUser' => $orders
        ]);
    }

    public function togglePaymentStatus($id)
    {
        $order = orderUser::findOrFail($id); // Ganti `Order` dengan nama model yang sesuai
        $order->is_payment_status = !$order->is_payment_status; // Toggle status
        $order->save();

        $status = $order->is_payment_status ? 'paid' : 'unpaid';
        return redirect()->back()->with('success', "Order marked as {$status} successfully!");
    }
}
