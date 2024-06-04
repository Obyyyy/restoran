<?php

namespace App\Http\Controllers\Food;

use App\Models\Food\Cart;
use App\Models\Food\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        // $deleteItem = Cart::where('user_id', Auth::user()->id)->where('food_id', $food_id);
        // $deleteItem->delete();

        return redirect()->route('display-cart')->with(['message' => 'The food has deleted from cart successfully!']);
    }

    public function prepareCheckout(Request $request) {
        $value = $request->price;
        $price = Session::put('price', $value);

        $priceSession = Session::get('price');

        if ($priceSession > 0) {
            return redirect()->route('cart-checkout');
        }
    }

    public function checkout () {
        if (Session::get('price') == 0) {
            abort(403);
        } else {
            return view('checkout');
        }
    }

    public function storeCheckout (Request $request) {
        $checkout = Checkout::create([
            'user_id' => Auth::user()->id,
            'price' => $request->price,
            'name' => $request->name,
            'email' => $request->email,
            'town' => $request->town,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        // echo "Payng with paypal";

        if ($checkout) {
            return redirect()->route('pay');
        }
    }

    public function payingOrder () {
        if (Session::get('price') == 0) {
            abort(403);
        } else {
            return view('pay');
        }
    }

    public function successPayment () {
        $deleteItem = Cart::where('user_id', Auth::user()->id);
        $deleteItem->delete();

        if ($deleteItem) {
            if (Session::get('price') == 0) {
                abort(403);
            } else {
                Session::forget('price');
                Session::put('success', 'Your payment have been done successfully');

                return view('success-payment');
            }
            // return redirect()->view('success-payment')->with(['success' => 'Your payment have been done successfully']);
        }
    }

}