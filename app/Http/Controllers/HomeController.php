<?php

namespace App\Http\Controllers;

use App\Models\Food\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breakfastFoods = Food::select()->take(8)->where('category', 'breakfast')->get();
        $launchFoods = Food::select()->take(8)->where('category', 'launch')->get();
        $dinnerFoods = Food::select()->take(8)->where('category', 'dinner')->get();

        return view('home', ['breakfastFoods' => $breakfastFoods, 'launchFoods' => $launchFoods, 'dinnerFoods' => $dinnerFoods]);
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
}