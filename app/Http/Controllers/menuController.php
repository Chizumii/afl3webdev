<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $selectedDate = $request->input('selected_date');

        $menus = Menu::with('restos') // ngeload relasi restoran
            ->when($selectedDate, function ($query, $date) {
                $query->whereHas('menuDates', function ($subQuery) use ($date) {
                    $subQuery->where('date', $date);
                });
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