<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\IsAdmin;
use App\Http\Models\User;
use App\Models\Admin;
Route::get('/', [MyHomeController::class, 'index']);
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/product', function () {
    return view('productt');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/login', [AdminController::class, 'login']) ->name('login');
Route::get('/admins', [AdminController::class, 'index']);//->middleware('is_admin');
Auth::routes();
// Route for slideshow
Route::get('/admins/slideshow', [SlideshowController::class, 'ListAll']);
Route::get('/admins/slideshow/endisable/{id}/{action}', [SlideshowController::class, 'enableDisable'])->name('enabledisable');
Route::get('/admins/slideshow/moveupdown/{id}/{action}', [SlideshowController::class, 'moveUpDown'])->name('moveupdown');
Route::get('/admins/slideshow/delete/{id}', [SlideshowController::class, 'delete'])->name('delete');
Route::get('/admins/slideshow/form', [SlideshowController::class, 'form'])->name('form');
Route::post('/admins/slideshow/add', [SlideshowController::class, 'add'])->name('add');
//Route for cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');

