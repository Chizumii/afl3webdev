<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []); // Ini buat ambil data keranjang dari session klo ad
    
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity', 1);
    
        // ini buat memastikan klo ada gak datanya di keranjang
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity; //buat tambah quantity
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image, 
                'quantity' => $quantity,
            ];
        }
    
        // simpan lg ke session
        session()->put('cart', $cart);
    
        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil ditambahkan ke keranjang!',
            'cart' => $cart,
        ]);
    }
    
}
