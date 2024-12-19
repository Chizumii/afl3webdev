<?php

namespace App\Http\Controllers;

use App\Models\category;

class categoryController extends Controller
{
    public function showAllCategory(){
    // ini untuk ambil kategori secara acar, kategorinya ada 25
    $categories = Category::select('id', 'category_name')
                          ->distinct('category_name') // distinct di pake biar namanya gak duplicate
                          ->inRandomOrder() // buat acak urutran kategori
                          ->take(25) // ambil 25 kategori
                          ->get();

    return view('fusions', compact('categories'));
    }
}

