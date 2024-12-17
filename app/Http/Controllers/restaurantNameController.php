<?php

namespace App\Http\Controllers;

use App\Models\resto;
use Illuminate\Http\Request;

class restaurantNameController extends Controller
{
    public function showAllRestaurants()
    {
        $restos = resto::all();

        return view('restaurants', [
            'pagetitle' => "Daftar Restoran",
            'restos' => $restos
        ]);
    }
}
