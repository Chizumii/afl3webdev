<?php

namespace App\Http\Controllers;

use App\Models\menuDate;
use Illuminate\Http\Request;

class menuDateAdminController extends Controller
{
    public function index()
    {
        // Mengambil semua data MenuDate beserta relasi Menu
        $menuDates = menuDate::with('menus')->get();

        return view('menuDateAdmin', compact('menuDates'));
    }
}
