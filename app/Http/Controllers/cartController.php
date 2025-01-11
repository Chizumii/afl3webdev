<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function add(Request $request)
{
    // Ambil data dari request
    $cart = session()->get('cart', []);

    // Jika item sudah ada di keranjang, tambah jumlahnya
    if (isset($cart[$request->id])) {
        $cart[$request->id]['quantity'] += $request->quantity;
    } else {
        // Jika belum ada, tambah item baru ke keranjang
        $cart[$request->id] = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'images' => $request->images, // Menyimpan array gambar
            'quantity' => $request->quantity,
        ];
    }

    // Simpan keranjang ke session
    session()->put('cart', $cart);

    return response()->json(['message' => 'Item added to cart', 'cart' => $cart]);
}


       // Memperbarui quantity item di keranjang
       public function update(Request $request)
       {
           $cart = session()->get('cart', []);
   
           if(isset($cart[$request->id])) {
               $cart[$request->id]['quantity'] = $request->quantity;
           }
   
           session()->put('cart', $cart);
   
           return response()->json(['message' => 'Cart updated', 'cart' => $cart]);
       }
   
       // Menghapus item dari keranjang
       public function remove(Request $request)
       {
           $cart = session()->get('cart', []);
   
           if(isset($cart[$request->id])) {
               unset($cart[$request->id]);
           }
   
           session()->put('cart', $cart);
   
           return response()->json(['message' => 'Item removed from cart', 'cart' => $cart]);
       }
    
}
