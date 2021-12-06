<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function getAllRestaurants()
    {
        $restaurants = Restaurant::all();

        return view('restaurant.getAllRestaurants',[
            'restaurants' => $restaurants,
        ]);
    }
}
