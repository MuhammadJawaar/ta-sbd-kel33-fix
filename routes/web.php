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
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/{id}/softDelete', [ProductController::class, 'softDelete'])->name('products.softDelete');
Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::post('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories/{id}/softDelete', [CategoryController::class, 'softDelete'])->name('categories.softDelete');
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');



