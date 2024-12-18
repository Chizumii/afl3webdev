<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home',[
        "pagetitle" => "KATERINGKU"
    ]);
});
use App\Http\Controllers\restaurantController;


Route::get('/restaurants', [restaurantController::class,'showRestaurants'])->name('restaurant');

Route::get('/restaurants/{id}', [RestaurantController::class, 'find'])->name('restaurants.show');

Route::get('/profile', function () {
    return view('profile',[
        "pagetitle" => "profile"
    ]);
});
Route::get('/signup', function () {
    return view('signup',[
        "pagetitle" => "Login"
    ]);
});
Route::get('/signin', function () {
    return view('signin',[
        "pagetitle" => "Login"
    ]);
});
Route::get('/fusion', function () {
    return view('fusions',[
        "pagetitle" => "Fusions"
    ]);
});
Route::get('/orderstatus', function () {
    return view('orderstatus',[
        "pagetitle" => "Order Status"
    ]);
});




// Route::get('signup', [RegisterController::class, 'create'])->name('signup');
// Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/home', function () {
    return view('home'); // Mengarah ke resources/views/home.blade.php
})->name('home')->middleware('auth'); // Hanya bisa diakses jika user sudah login



Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');