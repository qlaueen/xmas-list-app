<?php

use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// short way for returning static pages
Route::view('/', 'homepage');

Route::get('/test', function () {
    return view('/test', [ 
        'hello' => 'world',
        'request' => request('request', 'default')
    ]);
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);

Route::delete('/logout', [SessionsController::class, 'destroy']);

Route::get('/wishlists', [WishlistController::class, 'index']);
Route::get('/wishlists/create', [WishlistController::class, 'create']);
Route::get('/wishlists/{whishlist}', [WishlistController::class, 'show']);
Route::post('/wishlists', [WishlistController::class, 'store']);
Route::get('/wishlists/{whishlist}/edit', [WishlistController::class, 'edit']);
Route::patch('/wishlists/{wishlist}', [WishlistController::class, 'update']);