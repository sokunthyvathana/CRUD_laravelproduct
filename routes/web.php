<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Product routes (protected)
Route::get('/product/{proID}', [ProductController::class, 'getByID']);
Route::get('/product', [ProductController::class, 'create']);
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('/product', [ProductController::class, 'store'])->name('store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/product/{id}/view', [ProductController::class, 'show'])->name('products.show');

