<?php

use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// short way for returning static pages
Route::view('/', 'homepage');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/wishlists', [WishlistController::class, 'index']);
    Route::get('/wishlists/create', [WishlistController::class, 'create']);
    Route::get('/wishlists/{wishlist}', [WishlistController::class, 'show']);
    Route::post('/wishlists', [WishlistController::class, 'store']);
    Route::get('/wishlists/{wishlist}/edit', [WishlistController::class, 'edit']);
    Route::patch('/wishlists/{wishlist}', [WishlistController::class, 'update']);
    Route::delete('/wishlists/{wishlist}', [WishlistController::class, 'destroy']);

    // Route::get('/wishlists', [Item::class, 'index']);    
    Route::get('/wishlists/{wishlist}/items/create', [ItemController::class, 'create']);
    Route::post('/wishlists/{wishlist}/items', [ItemController::class, 'store']);
    Route::get('/wishlists/{wishlist}/items/{item}/edit', [ItemController::class, 'edit']);
    Route::patch('/wishlists/{wishlist}/items/{item}', [ItemController::class, 'update']);
    Route::delete('/wishlists/{wishlist}/items/{item}', [ItemController::class, 'destroy']);

    Route::delete('/logout', [SessionsController::class, 'destroy']);
});