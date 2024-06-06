<?php

use App\Models\Review;
use App\Models\Food\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Food\FoodController;

Route::get('/', function () {

    return redirect()->route('home');
});

Auth::routes();

// Home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// About page
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
// Menu Page
Route::get('/menu', [HomeController::class, 'menuPage'])->name('menu-page');
Route::get('/services', [HomeController::class, 'servicesPage'])->name('services-page');
Route::get('/contact', [HomeController::class, 'contactPage'])->name('contact-page');

// Food Section
Route::get('/foods/{food:slug}', [FoodController::class, 'foodDetail'])->name('food-detail');
// Route::get('/foods/{food:slug}', [FoodController::class, 'cartDetail'])->name('cart-detail');

// cart
Route::post('/foods/{food:slug}', [FoodController::class, 'addToCart'])->name('food-cart-add');
Route::get('/cart', [FoodController::class, 'displayCart'])->name('display-cart');


Route::group(['prefix' => 'cart'], function() {
    Route::get('/delete/{id}', [FoodController::class, 'deleteCartItem'])->name('delete-cart-item');
    // Checkout
    Route::post('/payment/prepare-checkout', [FoodController::class, 'prepareCheckout'])->name('prepare-checkout');
    Route::get('/payment/checkout', [FoodController::class, 'checkout'])->name('cart-checkout');
    Route::post('/payment/checkout', [FoodController::class, 'storeCheckout'])->name('store-checkout');

    Route::get('/payment/pay', [FoodController::class, 'payingOrder'])->name('pay');
    Route::get('/payment/success', [FoodController::class, 'successPayment'])->name('success-payment');
});

// Booking tables
Route::post('/booking', [BookingController::class, 'bookingTables'])->name('booking-table');

Route::group(['prefix' => 'users'], function() {
    // users page
    Route::get('/bookings', [UserController::class, 'getBookings'])->name('users-bookings');
    Route::get('/orders', [UserController::class, 'getOrders'])->name('users-orders');

    // Review
    Route::get('/review', [UserController::class, 'displayReview'])->name('review-page');
    Route::post('/review', [UserController::class, 'submitReview'])->name('submit-review');
});