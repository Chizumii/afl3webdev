<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Menu;
use App\Models\resto;
use App\Models\restoPairing;
use Illuminate\Http\Request;

class FusionController extends Controller
{
    // Menampilkan restoran berdasarkan kategori
    public function show($id)
    {
        // Mencari kategori berdasarkan ID
        $category = category::findOrFail($id);
        
        // Mengambil restoran dan memuat data menu yang berelasi
        $restaurants = restoPairing::with(['resto.menus'])->where('category_id', $id)->get();
    
        // Mengirimkan data ke view
        return view('fusionFood', compact('category', 'restaurants'));
    }
 
}
