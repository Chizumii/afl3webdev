<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\menuDate;
use App\Models\resto;
use Illuminate\Http\Request;

class MenuDateController extends Controller
{
    public function index(Request $request)
    {
        // Input filter date
        $selectedDate = $request->input('selected_date');

        // Get all menus with their restaurant relationships
        $query = Menu::with('restos');

        if ($selectedDate) {
            // If date is selected, filter menus that are available on that date
            $query->whereHas('menuDates', function ($query) use ($selectedDate) {
                $query->whereDate('date', $selectedDate);
            });
        } 

        // Execute the query
        $filteredMenus = $query->get();
       
        return view('restaurants', compact('filteredMenus'));

    
        // //input filter date
        // $selectedDate = $request->input('selected_date', now()->format('Y-m-d'));
        
        // //get all menu
        // $menus = Menu::with('restos')->get();

        // //get id menu 
        // $menuId = menuDate::with('menus')->get();

        // // Mengambil semua data MenuDate beserta relasi Menu

        // //get detail menu without date
        // $menuDates = menuDate::with('menus')->get(); // -> id menus

        // // get detail menu with date
        // $menu = Menu::with('restos')->get();

    }
    public function create(Request $request)
    {
        return view('cart');
    }

    public function store(Request $request){
        
    }
    
    
    

}