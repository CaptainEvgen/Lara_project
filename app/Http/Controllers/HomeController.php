<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function search(Request $request){
        $restaurants = Restaurant::where('name', 'LIKE', "%{$request->text}%")->get();
        $products = Product::where('name', 'LIKE', "%{$request->text}%")->get();
        $all = $restaurants->merge($products)
            ->take(5)
            ->all();
        return response()->json($all);
    }
    public function setEmail(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->validate([
            'email' => 'email',
        ]);
        $user->email = $data['email'];
        $user->save();
    }
}
