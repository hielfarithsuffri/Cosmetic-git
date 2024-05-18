<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/product_detail/{id}', [HomeController::class, 'product_detail']);
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/session', [StripeController::class,'session'])->name('session');
Route::get('/success', [StripeController::class,'success'])->name('success');


Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::get('/view_category', [AdminController::class, 'view_category'])->name('view_category');
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);


Route::post('/add_category', [AdminController::class, 'add_category']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);