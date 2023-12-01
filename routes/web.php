<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
