<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\CartController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('shop',[HomeController::class,'Shop'])->name('shop');
    Route::view('about','front-app.about')->name('about');
    Route::view('terms-conditions','front-app.terms_conditions')->name('terms_conditions');
    Route::get('brand/{slug}',[HomeController::class,'BrandData'])->name('brand');
    Route::get('category/{slug}',[HomeController::class,'CategoryData'])->name('category');
    Route::get('product/{slug}',[HomeController::class,'ProductDetail'])->name('product_detail');
    Route::post('cart-items',[CartController::class,'ShowCart'])->name('show_cart');
    Route::post('add-to-cart',[CartController::class,'AddToCart'])->name('add_to_cart');
