<?php

namespace App\Http\Controllers;

use App\Models\deliveryStatus;
use App\Models\orderDetail;
use Illuminate\Http\Request;

class orderDetailAdminController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with([
            'orderUser.users',
            'deliveryStatuses',
            'menuDates.menus'
        ])->get();

        // Group orders by order_user_id for better organization
        $groupedOrders = $orderDetails->groupBy('order_user_id');
        
        $deliveryStatuses = deliveryStatus::all();
    
        return view('orderdetailAdmin', compact('groupedOrders', 'deliveryStatuses'));
   
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
