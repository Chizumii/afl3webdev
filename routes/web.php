<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',[
        "pagetitle"=>"Welcome"
    ]);
});
Route::get('/home', function () {
    return view('home',[
        "pagetitle" => "Home"
    ]);
});
Route::get('/restaurant', function () {
    return view('restaurant',[
        "pagetitle" => "Restaurant"
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

