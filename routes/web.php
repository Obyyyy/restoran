<?php

use App\Models\Food\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Food\FoodController;
use App\Http\Controllers\UserController;

Route::get('/', function () {

    $breakfastFoods = Food::select()->take(8)->where('category', 'breakfast')->get();
    $launchFoods = Food::select()->take(8)->where('category', 'launch')->get();
    $dinnerFoods = Food::select()->take(8)->where('category', 'dinner')->get();

    return view('home', ['breakfastFoods' => $breakfastFoods, 'launchFoods' => $launchFoods, 'dinnerFoods' => $dinnerFoods]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Menu Page
Route::get('/menu', [HomeController::class, 'menuPage'])->name('menu-page');

// Food Section
Route::get('/foods/{food:slug}', [FoodController::class, 'foodDetail'])->name('food-detail');
// Route::get('/foods/{food:slug}', [FoodController::class, 'cartDetail'])->name('cart-detail');

// cart
Route::post('/foods/{food:slug}', [FoodController::class, 'addToCart'])->name('food-cart-add');
Route::get('/cart', [FoodController::class, 'displayCart'])->name('display-cart');
Route::get('/cart/delete/{id}', [FoodController::class, 'deleteCartItem'])->name('delete-cart-item');

// Checkout
Route::post('/cart/payment/prepare-checkout', [FoodController::class, 'prepareCheckout'])->name('prepare-checkout');
Route::get('/cart/payment/checkout', [FoodController::class, 'checkout'])->name('cart-checkout');
Route::post('/cart/payment/checkout', [FoodController::class, 'storeCheckout'])->name('store-checkout');

Route::get('/cart/payment/pay', [FoodController::class, 'payingOrder'])->name('pay');
Route::get('/cart/payment/success', [FoodController::class, 'successPayment'])->name('success-payment');

// Booking tables
Route::post('/booking', [BookingController::class, 'bookingTables'])->name('booking-table');

// users page
Route::get('/users/bookings', [UserController::class, 'getBookings'])->name('users-bookings');
Route::get('/users/orders', [UserController::class, 'getOrders'])->name('users-orders');