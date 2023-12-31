<?php

use Illuminate\Support\Facades\Route;

// routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {    return redirect()->route('login');});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth.check'], function () {
    Route::get('/home', [HomeController::class, 'show'])->name('home.show');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/{id}/softDelete', [ProductController::class, 'softDelete'])->name('products.softDelete');
    Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::post('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::get('/products/search/', [ProductController::class, 'search'])->name('products.search');



    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories/{id}/softDelete', [CategoryController::class, 'softDelete'])->name('categories.softDelete');
    Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::get('/categories/search/', [CategoryController::class, 'search'])->name('categories.search');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transactions.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transactions.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transactions.store');
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transactions.edit');
    Route::put('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transactions.update');
    Route::delete('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transactions.destroy');
    Route::post('/transaksi/{id}/softDelete', [TransaksiController::class, 'softDelete'])->name('transactions.softDelete');
    Route::get('/transaksi/trash', [TransaksiController::class, 'trash'])->name('transactions.trash');
    Route::post('/transaksi/{id}/restore', [TransaksiController::class, 'restore'])->name('transactions.restore');
});
