<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'address' => 'nullable|string',
            'number' => 'nullable|string',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'address' => $request->address,
            'number' => $request->number,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.form')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('login'); // Mengarah ke view login
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Login berhasil, arahkan ke halaman home
            return redirect()->route('home');
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
            "pagetitle" => "Login"
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.form'); // Redirect ke halaman login setelah logout
    }
}