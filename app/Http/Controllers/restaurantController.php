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

    public function showRestaurants()
    {
        // ambil restoran dari menu 
        $menu = menu::with('restos')->get(); // ambil semua menu
        $resto = resto::with('menus')->get();

        return view('restaurants', [
            'menus' => $menu,
            'restos' => $resto
        ]);
    }

}