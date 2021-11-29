<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage(){
        $restaurants = Restaurant::all();
        $products = Product::inRandomOrder()->paginate(6);
        return view('home.showHomePage',[
            'restaurants' => $restaurants,
            'products' => $products,
        ]);
    }
}
