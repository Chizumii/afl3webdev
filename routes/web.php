<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\fusionController;
use App\Http\Controllers\fusionsController;
use App\Http\Controllers\menuAdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\menuDateAdminController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\orderDetailAdminController;
use App\Http\Controllers\orderUserAdmin;
use App\Http\Controllers\orderUserAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\restaurantAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\restaurantController;
use App\Http\Controllers\userListController;
use App\Models\orderUser;

Route::get('/', function () {
    return view('home',[
        "pagetitle" => "KATERINGKU"
    ]);
});
Route::get('/signup', function () {
    return view('signup',[
        "pagetitle" => "signup"
    ]);
});


Route::get('/cart', function () {return view('cart');})->name('cart.index');


Route::get('/restaurants', [restaurantController::class,'showRestaurants'])->name('restaurant');
Route::get('/restaurants/{id}', [RestaurantController::class, 'find'])->name('restaurants.show');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/home', function () {
    return view('home'); 
})->name('home')->middleware('auth'); 

Route::get('/fusion', [categoryController::class, 'showAllCategory']);
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/categories/{id}/restaurants', [fusionController::class, 'show']);

Route::get('/orderstatus', [OrderController::class, 'showOrders'])->name('orders.show');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    // Menampilkan form untuk mengedit profil
    Route::get('/profile/edit', [AuthController::class, 'showEditForm'])->name('profile.edit');
    
    // Memperbarui profil user
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});



Route::middleware('auth')->group(function () {
    // Rute untuk menambah item ke keranjang
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    
    // Rute untuk memperbarui quantity item di keranjang
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    
    // Rute untuk menghapus item dari keranjang
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});







// ADMIN ROUTES - Wrapped in 'auth' middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin.dashboard');

    Route::get('/restaurantAdmin', function () {
        return view('restaurantAdmin');
    })->name('restaurantAdmin.show');

    Route::get('/menuAdmin', function () {
        return view('menuAdmin');
    })->name('menuAdmin.show');

    Route::get('/menuDateAdmin', function () {
        return view('menuDateAdmin');
    })->name('menuDateAdmin.show');

    Route::get('/userlist', function () {
        return view('userlist');
    })->name('userlist.show');

    Route::get('/orderdetailAdmin', function () {
        return view('orderdetailAdmin');
    })->name('orderdetailAdmin.show');

    Route::get('/orderstatusAdmin', function () {
        return view('userlist');
    })->name('userlist.show');

    Route::resource('/userlist', userListController::class);
    Route::resource('/menuAdmin', menuAdminController::class);
    Route::resource("/orderstatusAdmin", orderUserAdminController::class);
    Route::resource('/orderdetailAdmin', orderDetailAdminController::class);
    Route::resource('/menuDateAdmin', menuDateAdminController::class);
    Route::resource('/restaurantAdmin', restaurantAdminController::class);

    Route::patch('/orders/{id}/toggle-payment', [orderUserAdminController::class, 'togglePaymentStatus'])->name('orders.togglePayment');
    Route::patch('/order-details/{id}/update-status', [orderDetailAdminController::class, 'updateStatus'])->name('orderDetails.updateStatus');
});