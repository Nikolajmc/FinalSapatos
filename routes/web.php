<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AppController::class, 'index'])->name('app.index');

Auth::routes();
Route::middleware('auth')->group(function() {
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});
Route::middleware('auth')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/view_category', [AdminController::class, 'viewCategory']);
Route::post('/add_category', [AdminController::class, 'addCategory']);
Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory']);
Route::get('/view_product', [AdminController::class, 'viewProduct']);
Route::post('/add_product', [AdminController::class, 'addProduct']);
Route::get('/show_product', [AdminController::class, 'showProduct']);
Route::get('/show_all_product', [AdminController::class, 'showAllProduct']);
Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct']);
Route::get('/update_product/{id}', [AdminController::class, 'updateProduct']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'updateProductConfirm']);
Route::get('/shipped_out/{id}', [AdminController::class, 'shippedOut']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/orders', [AdminController::class, 'orders']);

Route::get('/product_detail/{id}', [AppController::class, 'productDetail']);
Route::post('/add_cart/{id}', [AppController::class, 'addCart']);
Route::get('/show_cart', [AppController::class, 'showCart']);
Route::get('/remove_cart/{id}', [AppController::class, 'removeCart']);
Route::get('/cash_order', [AppController::class, 'cashOrder']);
Route::get('/thankyou', [AppController::class, 'thankyou']);
Route::post('/add_wishlist/{id}', [AppController::class, 'addWishlist']);
Route::get('/show_wishlist', [AppController::class, 'showWishlist']);
Route::get('/remove_wishlist/{id}', [AppController::class, 'removeWishlist']);
Route::get('/about_us', [AppController::class, 'aboutUs']);
Route::get('/contact_us', [AppController::class, 'contactUs']);
Route::get('/shop', [AppController::class, 'shop']);
Route::get('/remove_all', [AppController::class, 'removeAll']);
Route::get('/search', [AppController::class, 'searchData']);