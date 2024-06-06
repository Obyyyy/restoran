<?php

namespace App\Http\Controllers;

use App\Models\Food\Food;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breakfastFoods = Food::select()->take(4)->where('category', 'breakfast')->get();
        $launchFoods = Food::select()->take(4)->where('category', 'launch')->get();
        $dinnerFoods = Food::select()->take(4)->where('category', 'dinner')->get();
        $reviews = Review::select()->take(4)->get();

        return view('home', ['breakfastFoods' => $breakfastFoods, 'launchFoods' => $launchFoods, 'dinnerFoods' => $dinnerFoods, 'reviews' => $reviews]);
    }

    public function about()
    {

    return view('about');
    }

    public function menuPage()
    {
        $breakfastFoods = Food::select()->where('category', 'breakfast')->get();
        $launchFoods = Food::select()->where('category', 'launch')->get();
        $dinnerFoods = Food::select()->where('category', 'dinner')->get();

        return view('menu', compact('breakfastFoods', 'launchFoods', 'dinnerFoods'));
    }

    public function servicesPage()
    {

    return view('pages.services');
    }
    public function contactPage()
    {

    return view('pages.contact');
    }
}