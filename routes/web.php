<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesItemController;
use App\Http\Controllers\ProductSalesController;
use App\Models\SalesItem;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/contact', 'contact');
Route::get('/sales_items', function() {
    $sales_items = SalesItem::all();
    dd($sales_items);
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);  

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::patch('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

//Sales
Route::get('/sales_items', [SalesItemController::class, 'index'])->name('sales_items.index');
Route::get('/sales_items/create', [SalesItemController::class, 'create']);
Route::post('/sales_items', [SalesItemController::class, 'store'])->middleware('auth');

//Product Sales
Route::get('/product_sales', [ProductSalesController::class, 'index']);

