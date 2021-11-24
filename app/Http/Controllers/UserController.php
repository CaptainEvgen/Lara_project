<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        return view('user.login');
    }
    public function register(Request $request){
        if ($request->isMethod('post')){

            $data = $request->all();
            $user = new User;
            if($data['password'] === $data['password_confirm']){
                $user->password = $data['password'];
            }
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->telephone_number = $data['telephone_number'];

            if($request->name !== null && $request->location !== null && $request->location_name !== null){
                $user->role_id = 2;
                $restaurant = new Restaurant;
                $restaurant->name = $request->name;
                $restaurant->location = $request->location;
                $restaurant->location_name = $request->location_name;
                $restaurant->save();
                $id = Restaurant::where('name', $request->name)->first()->id;
                $user->restaurant_id = $id;
            };

            $user->save();

            return redirect('/login')->with('message', 'Вы успешно зарегестрированы!');
        }
        return view('user.register');
    }
}
