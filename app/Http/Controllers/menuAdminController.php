<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class menuAdminController extends Controller
{
    public function index()
    {
        // Ambil semua menu beserta restoran yang terkait
        $menus = Menu::with('restos')->get();

        // Kirimkan ke view dengan variabel `menus`
        return view('menuAdmin', ['menus' => $menus]);
    }
}
