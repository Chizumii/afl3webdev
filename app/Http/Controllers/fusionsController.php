<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\resto;
use Illuminate\Http\Request;

class fusionsController extends Controller
{
    public function showRestaurants()
    {
        // Ambil semua restoran dengan menu terkait
        $menu = Menu::with('restos')->get(); // Ambil semua menu
        $resto = resto::with('menus')->get();

        return view('fusionfood', [
            'menus' => $menu,
            'restos' => $resto
        ]);
    }
}
