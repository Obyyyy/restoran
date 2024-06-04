<?php

namespace App\Http\Controllers;

use App\Models\Food\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    public function bookingTables(Request $request)
    {
        $currentDate = date("m/d/Y h:i:sa");

        if ($request->date == $currentDate OR $request->date < $currentDate) {
            return redirect()->route('home')->with(['error' => 'You can\'t book with the current date or with a date in the past']);
        } else {
            $bookingTables = Booking::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'date' => $request->date,
                'num_people' => $request->num_people,
                'spe_request' => $request->spe_request,
            ]);

            if ($bookingTables) {
                return redirect()->route('home')->with(['booked' => 'You booked a table']);
            }
        }
    }
}