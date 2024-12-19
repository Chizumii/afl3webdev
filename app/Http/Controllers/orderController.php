<?php

namespace App\Http\Controllers;

use App\Models\orderDetail;
use App\Models\orderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
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

        return view('orderstatus', compact('orderDetails'));
    }
}
