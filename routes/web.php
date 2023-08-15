<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PageHomeController;

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
route::group(['middleware'=>'sitesetting'],function(){

    Route::get('/',[PageHomeController::class,'index'])->name('index');
    Route::get('/abouts',[PageController::class,'abouts'])->name('abouts');
    Route::get('/contact',[PageController::class,'contact'])->name('contact');
    Route::post('/contact/add',[AjaxController::class,'contactadd'])->name('contact.add');
    Route::get('/products/{slug?}',[PageController::class,'products'])->name('products');
    Route::get('/child/{slug?}',[PageController::class,'products'])->name('childproducts');
    Route::get('/Man/{slug?}',[PageController::class,'products'])->name('manproducts');
    Route::get('/woman/{slug?}',[PageController::class,'products'])->name('womanproducts');
    Route::get('/discount',[PageController::class,'discountProducts'])->name('discountProducts');
    Route::get('/product/{slug?}',[PageController::class,'productsdetail'])->name('productsdetail');
    Route::get('/cart',[CartController::class,'cart'])->name('cart');
    Route::post('/cart/Add',[CartController::class,'add'])->name('cart.add');
    Route::post('/cart/remove',[CartController::class,'remove'])->name('cart.remove');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
