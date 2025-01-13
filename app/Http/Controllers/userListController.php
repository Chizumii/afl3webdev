<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userListController extends Controller
{
    public function index()
    {
        // Mengirimkan semua data dari tabel User ke view
        return view('userlist', [
            'allUsers' => User::all(), // Pastikan nama key ini sama dengan di view
        ]);
    }
}
