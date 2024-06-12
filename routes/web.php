<?php

use App\Models\Review;
use App\Models\Food\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Food\FoodController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\checkForAuth;

Auth::routes();

// Navbar page
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
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

// Admin
// Route::get('/admin/login', [AdminController::class, 'displayAdminLogin'])->name('display-admin-login')->middleware(checkForAuth::class);
Route::get('/admin/login', [AdminController::class, 'displayAdminLogin'])->name('display-admin-login')->middleware('checkForAuth');
Route::post('/admin/login', [AdminController::class, 'checkAdminLogin'])->name('admin-login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    // Admins
    Route::get('/admins', [AdminController::class, 'allAdmins'])->name('all-admin-page');
    Route::get('/admins/create', [AdminController::class, 'displayCreateAdmins'])->name('display-create-admin');
    Route::post('/admins/create', [AdminController::class, 'createAdmins'])->name('create-admin');

    // Orders
    Route::get('/orders', [AdminController::class, 'allOrders'])->name('admin-orders-page');
    Route::get('/orders/edit/{id}', [AdminController::class, 'editOrder'])->name('admin-orders-edit');
    Route::post('/orders/edit/{id}', [AdminController::class, 'storeEditOrder'])->name('admin-orders-edit-save');
    Route::get('/orders/delete/{id}', [AdminController::class, 'deleteOrder'])->name('admin-orders-delete');

    // Bookings
    Route::get('/bookings', [AdminController::class, 'allBookings'])->name('admin-bookings-page');
    Route::get('/bookings/edit/{id}', [AdminController::class, 'editBooking'])->name('admin-bookings-edit');
    Route::post('/bookings/edit/{id}', [AdminController::class, 'storeEditBooking'])->name('admin-bookings-edit-save');
    Route::get('/bookings/delete/{id}', [AdminController::class, 'deleteBooking'])->name('admin-bookings-delete');

    // Foods
    Route::get('/foods', [AdminController::class, 'allFoods'])->name('admin-foods-page');
    Route::get('/foods/create', [AdminController::class, 'displayCreateFoods'])->name('admin-create-foods');
    Route::post('/foods/create', [AdminController::class, 'createFoods'])->name('admin-create-foods-save');
    Route::get('/foods/delete/{id}', [AdminController::class, 'deleteFood'])->name('admin-foods-delete');
});