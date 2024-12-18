<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    // app/Http/Controllers/CartController.php

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []); // Ambil data keranjang dari session (jika ada)
    
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image'); // Pastikan image dikirim dari form
        $quantity = $request->input('quantity', 1);
    
        // Periksa apakah item sudah ada di keranjang
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity; // Tambahkan jumlah jika sudah ada
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image, // Pastikan kunci 'image' ada di sini
                'quantity' => $quantity,
            ];
        }
    
        // Simpan kembali ke session
        session()->put('cart', $cart);
    
        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil ditambahkan ke keranjang!',
            'cart' => $cart,
        ]);
    }
    
}
