<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage(){
        $restaurants = Restaurant::all();
        $res2 = Restaurant::inRandomOrder()->paginate(2);
        $products = Product::inRandomOrder()->paginate(6);
        return view('home.showHomePage',[
            'restaurants' => $restaurants,
            'products' => $products,
            'res' => $res2,
        ]);
    }
}
