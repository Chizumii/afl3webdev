<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
{
    $selectedDate = $request->input('selected_date');

    $menus = Menu::with('restos') // Load restaurant relation
        ->when($selectedDate, function ($query, $date) {
            $query->whereHas('menuDates', function ($subQuery) use ($date) {
                $subQuery->where('date', $date);
            });
        })
        ->get();

    return view('restaurants', compact('menus', 'selectedDate'));
}

}