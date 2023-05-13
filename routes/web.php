<?php

use App\Http\Controllers\productController;
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

Route::get('/', [productController::class, 'viewProduct'])->name('product.view');
Route::get('/product/add', [productController::class, 'addProduct'])->name('product.add');
Route::post('/product/add', [productController::class, 'insertProduct'])->name('product.create');
Route::get('/product/{product}/update', [productController::class, 'updateProduct'])->name('product.update');
Route::post('/product/{id}/edit', [productController::class, 'editProduct'])->name('product.edit');
Route::get('/product/{id}/delete', [productController::class, 'deleteProduct'])->name('product.delete');