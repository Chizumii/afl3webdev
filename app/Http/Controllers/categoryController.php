<?php

namespace App\Http\Controllers;

use App\Models\category;

class categoryController extends Controller
{
    public function showAllCategory(){
    // Ambil 25 kategori unik secara acak
    $categories = Category::select('id', 'category_name')
                          ->distinct('category_name') // Memastikan kategori unik berdasarkan nama
                          ->inRandomOrder() // Acak urutan kategori
                          ->take(25) // Ambil hanya 25 kategori
                          ->get();

    return view('fusions', compact('categories'));
    }
}

