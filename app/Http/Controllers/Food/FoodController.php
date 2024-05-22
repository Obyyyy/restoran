<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Food\Cart;
use Illuminate\Http\Request;
use App\Models\Food\Food;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index()
    {
        return view('food-detail');
    }

    public function foodDetail(Food $food)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        // $food = Food::select()->where('slug', $slug)->get();
        // $food = Food::find()
        // return view('food-detail', ['food' => $food->select()->where('slug', $slug)->get()]);
        // $foodSelect = Food::select()->take(1)->where('slug', $food->slug)->get();

        $cart = Cart::where('food_id', $food->id)->where('user_id', Auth::user()->id)->count();

        return view('food-detail', ['food' => $food, 'cartVerifying' => $cart]);
    }

    public function addToCart(Request $request, $food) {
        Cart::create([
            'user_id' => $request->user_id,
            'food_id' => $request->food_id,
            'food_name' => $request->food_name,
            'food_price' => $request->food_price,
            'food_image' => $request->food_image,
        ]);

        return redirect()->route('food-detail', $food)->with(['message' => 'The food has added to cart successfully!']);
    }

    public function displayCart(){
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $cartItems = Cart::select()->where('user_id', Auth::user()->id)->get();
        $price = Cart::select()->where('user_id', Auth::user()->id)->sum('food_price');

        return view('cart', compact('cartItems', 'price'));
    }

    public function deleteCartItem($id) {
        Cart::find($id)->delete();

        return redirect()->route('display-cart')->with(['message' => 'The food has deleted from cart successfully!']);
    }
}