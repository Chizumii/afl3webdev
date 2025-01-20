<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index(Request $request)
    {
         $menus = Menu::with('restos')->get();

        // Kirimkan ke view dengan variabel `menus`
        return view('restaurants', ['menus' => $menus]);
    }

    public function create(Request $request)
    {
        return view('cart');
    }

    public function store(Request $request){
        
    }
    
    
    

}