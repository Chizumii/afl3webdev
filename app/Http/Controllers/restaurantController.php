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
        // Ambil semua restoran dengan menu terkait
        $menus = menu::with('restos')->get(); // Ambil semua menu
        $restos = resto::with('menus')->get();

        return view('restaurant', [
            'menus' => $menus,
            'restos' => $restos
        ]);
    }


}
