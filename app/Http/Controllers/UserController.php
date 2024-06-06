<?php

namespace App\Http\Controllers;

use App\Models\Food\Booking;
use App\Models\Food\Checkout;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getBookings() {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $bookings = Booking::select()->where('user_id', Auth::user()->id)->get();

        return view('users.bookings', compact('bookings'));
    }

    public function getOrders() {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $orders = Checkout::select()->where('user_id', Auth::user()->id)->get();

        return view('users.orders', compact('orders'));
    }

    public function displayReview() {
        if (!Auth::user()) {
            return redirect()->route('home');
        }

        return view('users.write-review');
    }

    public function submitReview(Request $request) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }

        $review = Review::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'review' => $request->review,
        ]);
        if ($review) {
            return redirect()->route('review-page')->with(['review' => 'Your review has been submitted successfully']);
        } else {
            echo "Error";
        }
    }
}
