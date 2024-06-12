<?php

namespace App\Http\Controllers\Admin;

use alert;
use App\Models\Food\Food;
use App\Models\Admin\Admin;
use Illuminate\Support\Str;
use App\Models\Food\Booking;
use Illuminate\Http\Request;
use App\Models\Food\Checkout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function displayAdminLogin()
    {
        return view('admins.login-admin');
    }

    public function checkAdminLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect() -> route('admin-dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function dashboard() {
        // if (!Auth::guard('admin')->user()) {
        //     return redirect()->route('display-admin-login');
        // }
        $foods = Food::select()->count();
        $checkouts = Checkout::select()->count();
        $bookings = Booking::select()->count();
        $admins = Admin::select()->count();

        return view('admins.index', compact('foods', 'checkouts', 'bookings', 'admins'));
    }

    public function allAdmins() {
        $admins = Admin::select()->get();
        return view('admins.admins', compact('admins'));
    }
    public function displayCreateAdmins() {
        return view('admins.create-admin');
    }

    public function createAdmins(Request $request) {
        // $email = Admin::select()->where('email', $request->email)->get();
        // if ($email) {
        //     return redirect()->route('all-admin-page')->with(['Error-Admin' => 'The email has already in use']);
        // }

        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:40',
            'password' => 'required|max:40',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 40 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 40 karakter.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.max' => 'Kata sandi tidak boleh lebih dari 40 karakter.',
        ]);

        $admins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($admins) {
            return redirect()->route('all-admin-page')->with(['admin' => 'Admin created successfully']);
        }
    }

    // Orders Section

    public function allOrders() {
        $orders = Checkout::select()->get();
        return view('admins.orders', compact('orders'));
    }

    public function deleteOrder($id) {
        $delete = Checkout::find($id)->delete();
        return redirect()->route('admin-orders-page')->with(['delete-order' => 'The order deleted successfully']);
    }

    public function editOrder($id) {
        $order = Checkout::find($id);
        return view('admins.edit-order', compact('order'));
    }

    public function storeEditOrder($id, Request $request) {
        $order = Checkout::find($id);
        if ($order) {
            // $order->update($request->all());
            $order->status = $request->status;
            $order->save();
        }
        return redirect()->route('admin-orders-page')->with(['edit-order' => 'The order edited successfully']);
    }

    // Foods
    public function allFoods() {
        $foods = Food::select()->get();
        return view('admins.foods', compact('foods'));
    }

    public function displayCreateFoods() {
        return view('admins.create-food');
    }

    public function createFoods(Request $request) {
        // $request->validate([
        //     'name' => 'required|max:40',
        //     'email' => 'required|email|max:40',
        //     'password' => 'required|max:40',
        // ], [
        //     'name.required' => 'Nama wajib diisi.',
        //     'name.max' => 'Nama tidak boleh lebih dari 40 karakter.',
        //     'email.required' => 'Email wajib diisi.',
        //     'email.email' => 'Format email tidak valid.',
        //     'email.max' => 'Email tidak boleh lebih dari 40 karakter.',
        //     'password.required' => 'Kata sandi wajib diisi.',
        //     'password.max' => 'Kata sandi tidak boleh lebih dari 40 karakter.',
        // ]);

        $destinationFile = 'img/';
        $inputImage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationFile), $inputImage);

        $slug = Str::slug($request->name);

        $foods = Food::create([
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $inputImage,
            'description' => $request->description,
        ]);

        if ($foods) {
            return redirect()->route('admin-foods-page')->with(['create-food' => 'Food created successfully']);
        }
    }

    public function deleteFood($id) {
        $food = Food::find($id);

        if (File::exists(public_path('img/'.$food->image))) {
            File::delete(public_path('img/'.$food->image));
        }

        $food->delete();

        return redirect()->route('admin-foods-page')->with(['delete-food' => 'The food deleted successfully']);
    }

    // Booking
    public function allBookings() {
        $bookings = Booking::select()->get();
        return view('admins.bookings', compact('bookings'));
    }

    public function editBooking($id) {
        $booking = Booking::find($id);
        return view('admins.edit-booking', compact('booking'));
    }

    public function storeEditBooking($id, Request $request) {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->update([
                'status' => $request->status,
            ]);
        }
        return redirect()->route('admin-bookings-page')->with(['edit-booking' => 'The book edited successfully']);
    }

    public function deleteBooking($id) {
        $delete = Booking::find($id)->delete();
        return redirect()->route('admin-bookings-page')->with(['delete-booking' => 'The booking deleted successfully']);
    }
}