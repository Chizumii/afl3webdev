<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\resto;
use Illuminate\Container\Attributes\Storage;
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

    public function create()
    {
        $restaurants = Resto::all();
        return view('createMenu', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
            'resto_id' => 'required|exists:restos,id',
        ]);

        Menu::create($validated);
        return redirect()->route('menuAdmin.index')->with('success', 'Menu created successfully!');
    }







    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $restaurants = resto::all();

        return view('editMenu', compact('menu', 'restaurants'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'menu_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'resto_id' => 'required|exists:restos,id',
        ]);

        // Perbarui menu tanpa gambar
        $menu->update($validated);

        return redirect()->route('menuAdmin.index')->with('success', 'Menu updated successfully!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menuAdmin.index')->with('success', 'Menu deleted successfully!');
    }
}
