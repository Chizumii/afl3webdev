<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
{
    $selectedDate = $request->input('selected_date', now()->format('Y-m-d'));

    $menus = Menu::with(['restos', 'menuDates' => function($query) use ($selectedDate) {
        $query->where('date', $selectedDate);
    }])
    ->whereHas('menuDates', function ($query) use ($selectedDate) {
        $query->where('date', $selectedDate);
    })
    ->get();

    return view('restaurants', compact('menus', 'selectedDate'));
}

    public function create(Request $request)
    {
        return view('cart');
    }

    public function store(Request $request){
        
    }
    
    
    

}