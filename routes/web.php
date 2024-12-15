<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',[
        "pagetitle" => "KATERINGKU"
    ]);
});
Route::get('/restaurant', function () {
    return view('restaurant',[
        "pagetitle" => "Restaurant"
    ]);
});
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
Route::delete('/delete-order/{id}', [ProjectController::class, 'deleteOrder']);

