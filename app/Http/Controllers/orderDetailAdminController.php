<?php

namespace App\Http\Controllers;

use App\Models\deliveryStatus;
use App\Models\orderDetail;
use Illuminate\Http\Request;

class orderDetailAdminController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with(['orderUser', 'deliveryStatuses'])->get(); // Pastikan relasi 'deliveryStatuses' sudah ada
        $deliveryStatuses = deliveryStatus::all(); // Ambil semua data delivery statuses
    
        return view('orderdetailAdmin', compact('orderDetails', 'deliveryStatuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'delivery_status_id' => 'required|exists:delivery_statuses,id',
        ]);

        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->delivery_status_id = $request->delivery_status_id;
        $orderDetail->save();

        return redirect()->back()->with('success', 'Delivery status updated successfully.');
    }
}
