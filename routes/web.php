<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', HomeController::class)->name('home');
Route::get('category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('category/{id}/item/{id2}', [HomeController::class, 'item'])->name('item');

Route::get('cart', CartController::class)->name('cart');
Route::get('category/{id}/item/{id2}/addcart', [CartController::class, 'addProducttoCart'])->name('addcart');
Route::get('category-name/{category_name}/delete', [CartController::class, 'deleteProductCart'])->name('deletecart');
Route::get('category/{id}/item/{id2}/quantity/{quantity}/updatecart', [CartController::class, 'updateCart'])->name('updatecart');


Route::get('order', OrderController::class)->name('order');

// ------------------------------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
