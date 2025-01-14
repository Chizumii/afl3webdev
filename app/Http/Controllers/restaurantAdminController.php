<?php

namespace App\Http\Controllers;

use App\Models\resto;
use Illuminate\Http\Request;

class restaurantAdminController extends Controller
{
    public function index()
    {
        // Mengambil semua data restaurant
        $restaurants = resto::all();

        return view('restaurantAdmin', compact('restaurants'));
    }
}
