<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\Restaurant;
use App\Models\resto;
use Illuminate\Http\Request;

class restaurantController extends Controller
{
    
    public function showRestaurants() {
        $restos = resto::with('menus')->get(); // Ambil semua restoran dengan menu terkait
        $menus = menu::all(); // Ambil semua menu
    
        return view('restaurant', compact('restos', 'menus'))
            ->with('pagetitle', 'Daftar Restoran');
    }
    
}