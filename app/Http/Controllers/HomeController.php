<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\User;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function showHomePage()
    {
        $restaurants = Restaurant::all();
        $randomRestaurants = Restaurant::inRandomOrder()->paginate(2);
        $products = Product::inRandomOrder()->paginate(6);


        return view('home.showHomePage',[
            'restaurants' => $restaurants,
            'products' => $products,
            'randomRestaurants' => $randomRestaurants,
        ]);
    }

    public function search(Request $request)
    {
        $restaurants = Restaurant::where('name', 'LIKE', "%{$request->text}%")->get();
        $products = Product::where('name', 'LIKE', "%{$request->text}%")->get();
        $all = $restaurants->merge($products)
            ->take(5)
            ->all();

        return response()->json($all);
    }

    public function setEmail(Request $request)
    {
        $data = $request->all();

        $result['status'] = 200;

        try {
            $result['data'] = $this->userService->setEmail($data);
        } catch (ValidationException $e) {
            $result = [
                'status' => 500,
                'message' =>$e->getMessage(),
                'errors' =>$e->errors(),
            ];
        }
        return response()->json($result, $result['status']);
    }
}
