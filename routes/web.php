<?php

use App\Models\Food\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Food\FoodController;

Route::get('/', function () {

    $breakfastFoods = Food::select()->take(8)->where('category', 'breakfast')->get();
    $launchFoods = Food::select()->take(8)->where('category', 'launch')->get();
    $dinnerFoods = Food::select()->take(8)->where('category', 'dinner')->get();

    return view('home', ['breakfastFoods' => $breakfastFoods, 'launchFoods' => $launchFoods, 'dinnerFoods' => $dinnerFoods]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Food Section
Route::get('/foods/{food:slug}', [FoodController::class, 'foodDetail'])->name('food-detail');
// Route::get('/foods/{food:slug}', [FoodController::class, 'cartDetail'])->name('cart-detail');

// Adding food to the cart
Route::post('/foods/{food:slug}', [FoodController::class, 'addToCart'])->name('food-cart-add');

Route::get('/cart', [FoodController::class, 'displayCart'])->name('display-cart');
Route::get('/cart/{id}', [FoodController::class, 'deleteCartItem'])->name('delete-cart-item');