<?php

namespace App\Http\Controllers;

use App\Models\orderDetail;
use Illuminate\Http\Request;

class orderDetailAdminController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with('orderUser')->get(); // Perhatikan 'orderUser'
        return view('orderdetailAdmin', compact('orderDetails'));
    }
}
