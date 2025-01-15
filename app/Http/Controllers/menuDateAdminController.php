<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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

    public function create()
    {
        // Mengambil semua data Menu
        $menus = Menu::all();

        return view('createMenuDate', compact('menus'));
    }

    // Menyimpan data menuDate ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'date' => 'required|date',
        ]);

        // Simpan data
        menuDate::create($validated);

        // Redirect ke halaman list menuDate atau tampilkan pesan sukses
        return redirect()->route('menuDateAdmin.index')->with('success', 'Menu Date created successfully!');
    }

    public function edit($id)
    {
        // Ambil data menuDate berdasarkan ID
        $menuDate = menuDate::findOrFail($id);
        $menus = Menu::all();

        return view('editMenuDate', compact('menuDate', 'menus'));
    }

    // Menyimpan data hasil edit ke database
    public function update(Request $request, $id)
    {
        // Ambil data menuDate berdasarkan ID
        $menuDate = menuDate::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'date' => 'required|date',
        ]);

        // Update data
        $menuDate->update($validated);

        // Redirect ke halaman list menuDate dengan pesan sukses
        return redirect()->route('menuDateAdmin.index')->with('success', 'Menu Date updated successfully!');
    }

    public function destroy($id)
    {
        // Ambil data menuDate berdasarkan ID
        $menuDate = menuDate::findOrFail($id);

        // Hapus data
        $menuDate->delete();

        // Redirect ke halaman list menuDate dengan pesan sukses
        return redirect()->route('menuDateAdmin.index')->with('success', 'Menu Date deleted successfully!');
    }
}
