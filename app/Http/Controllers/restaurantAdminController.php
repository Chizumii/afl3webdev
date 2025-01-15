<?php

namespace App\Http\Controllers;

use App\Models\resto;
use Illuminate\Http\Request;

class restaurantAdminController extends Controller
{
    public function index()
    {
        // Mengambil semua data restaurant
        $restaurants = resto::all();

        return view('restaurantAdmin', compact('restaurants'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat restoran baru
        return view('createRestaurant');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'resto_name' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

        // Menyimpan data restoran yang sudah divalidasi
        resto::create($validated);

        // Redirect ke halaman daftar restoran setelah data berhasil disimpan
        return redirect()->route('restaurantAdmin.index');
    }

    public function edit($id)
{
    // Ambil data restoran berdasarkan ID
    $restaurant = resto::findOrFail($id);

    // Tampilkan view untuk mengedit restoran
    return view('editRestaurant', compact('restaurant'));
}

public function update(Request $request, $id)
{
    // Validasi data
    $validated = $request->validate([
        'resto_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'number' => 'required|string|max:20',
    ]);

    // Cari restoran dan perbarui data
    $restaurant = resto::findOrFail($id);
    $restaurant->update($validated);

    // Redirect ke halaman daftar restoran
    return redirect()->route('restaurantAdmin.index')->with('success', 'Restaurant updated successfully.');
}

public function destroy($id)
{
    $restaurant = resto::findOrFail($id); // Cari data berdasarkan ID
    $restaurant->delete(); // Hapus data

    return redirect()->route('restaurantAdmin.index')->with('success', 'Restaurant deleted successfully.');
}


}
