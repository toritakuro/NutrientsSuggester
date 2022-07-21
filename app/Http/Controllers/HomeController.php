<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Food;
use App\Models\SevenFood;

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
        return view('home');
    }

    public function favorite()
    {
        return view('favorite');
    }

    public function result(Request $request)
    {
      // フォームから送られた値をそれぞれ格納
        $needprotein = $request -> protein;
        $needfat = $request -> fat;
        $needcarbo = $request -> carbo;

      // モデルを使って$foodsにデータを格納
        // $foods = new Food;
        // $foods = $foods->food()->toArray();
        // $i = 0;

        $sevenfoods = new SevenFood;
        $sevenfoods = $sevenfoods->sevenfood()->toArray();
        $i = 0;



        return view('result',compact('sevenfoods','needprotein','i','needfat','needcarbo'));
    }
}
