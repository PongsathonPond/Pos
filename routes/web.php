<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Category;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ListAll;
use App\Http\Controllers\DebtorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/shop', [CartController::class, 'cartList'])->name('shopP');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product_store');

    Route::get('/category', [Category::class, 'index'])->name('product.category');
    Route::post('/category/store', [Category::class, 'store'])->name('category_store');

    Route::post('/list/store', [ListAll::class, 'store'])->name('list');
    Route::get('/list', [ListAll::class, 'index'])->name('listindex');

    Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF1'])->name('showpdf');
    Route::get('generate-pdf2/{id}', [PDFController::class, 'generatePDF2'])->name('showpdf2');

    Route::get('/debtors', [DebtorsController::class, 'index'])->name('debtors.index');
    Route::post('/debtors/store', [DebtorsController::class, 'store'])->name('debtors_store');

});
