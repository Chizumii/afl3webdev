<?php

namespace App\Http\Controllers;

use App\Models\orderUser;
use App\Models\User;
use Illuminate\Http\Request;

class orderUserAdminController extends Controller
{
    public function index(){
        $orders = orderUser::with('users')->get();
        return view('orderUserAdmin', [
            'AllOrderUser' => $orders
        ]);
    }
    
    
    
}
