<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Menu;
use App\Models\resto;
use App\Models\restoPairing;
use Illuminate\Http\Request;

class FusionController extends Controller
{
    // tampilin restoran dari kategori
    public function show($id)
    {
        // cari kategori dari id
        $category = category::findOrFail($id);
        
        // ambil restoran dan panggil data menu yang berhubungan
        $restaurants = restoPairing::with(['resto.menus'])->where('category_id', $id)->get();
    
        // ini untuk kirim ke view
        // pake compact untuk menggabungkan nama variabel sebagai key dan nilai variabel tersebut sebagai value di dalam array.
        return view('fusionFood', compact('category', 'restaurants'));
    }
 
}
