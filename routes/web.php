<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AIController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; 
use App\Http\Controllers\Client\ClientController as CController;
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

Route::get('/', [CController::class, 'index'])->name('index.landing');
Route::get('/all-products', [CController::class, 'allProducts'])->name('allProducts');
Route::get('/product-details/{id}', [CController::class, 'productDetails'])->name('product.details');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/checkout', [CController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [CController::class, 'placeOrder'])->name('order.place');
Route::get('/order-success', [CController::class, 'orderSuccess'])->name('order.success');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::put('/orders/{order}/update-delivery-status', [OrderController::class, 'updateDeliveryStatus']);

Route::get('/openai/formprompt', [AIController::class, 'showForm'])->name('openai.formprompt');
Route::post('/store-product', [AIController::class, 'storeProduct'])->name('products.generate.store');

Route::get('/generate-product/{category}/{keys}', [AIController::class, 'generateProductAndImage'])->name('getPrompt');

Route::get('/generate-info', [AIController::class, 'productInfo'])->name('productInfo');


Route::get('/generate-product-back', [AIController::class, 'generateProductBack'])->name('generate.product.back');

Auth::routes();

