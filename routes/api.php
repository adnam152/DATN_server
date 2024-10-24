<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Products\ProductController;
use App\Http\Controllers\Api\Public\PublicController;
use App\Http\Controllers\Api\Wishlists\WishlistsController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware('api.auth');
    Route::post('check', [LoginController::class, 'check'])->middleware('api.auth');
    Route::post('register', RegisterController::class);
});
// public routes

Route::get('products', [PublicController::class, 'getAllProducts']);
Route::get('products/{slug}', [PublicController::class, 'getProductBySlug']);
Route::get('catalogues', [PublicController::class, 'getAllCatalogues']);
Route::get('tags', [PublicController::class, 'getAllTags']);
Route::get('blogs', [PublicController::class, 'getAllBlogs']);
Route::get('blogs/{slug}', [PublicController::class, 'getBlogBySlug']);


// admin routes
Route::group(['middleware' => 'api.auth'], function () {
    Route::apiResource('carts', CartController::class);
    Route::get('wish-list', [CartController::class, 'getAllWishlists']);
    Route::apiResource('wishlists', WishlistsController::class);
});