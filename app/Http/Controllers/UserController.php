<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect(route('homepage'))->with('message', 'Вы уже аутентифицированы');
        }
        $data = $request->only('telephone_number', 'password');

        if(Auth::attempt($data)){
            return redirect(route('homepage'))->with('message', Auth::user()->first_name.', вы успешно аутентифицированы!');
        }

        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('homepage'))->with('message', 'Вы успешно вышли из профиля');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->validate([
                'password' => 'required|min:8',
                'password_confirm' => 'required|min:8',
                'first_name'=> 'required|max:60|string',
                'last_name'=> 'max:60|string|nullable',
                'telephone_number'=> 'required|max:60|unique:users',
            ]);

            $user = new User;
            if($data['password'] === $data['password_confirm']){
                $user->password = Hash::make($data['password']);
            }
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->telephone_number = $data['telephone_number'];

            if($request->name !== null && $request->location_name !== null){
                $validater=$request->validate([
                    'name' => 'required|min:8|unique:restaurants',
                    'location_name'=> 'string|nullable',
                ]);
                $user->role_id = 2;
                $restaurant = new Restaurant;
                $restaurant->name = $validater['name'];
                $restaurant->location_name = $validater['location_name'];
                $restaurant->save();
                $id = Restaurant::where('name', $validater['name'])->first()->id;
                $user->restaurant_id = $id;
            };

            $user->save();

            return redirect(route('login'))->with('message', 'Вы успешно зарегестрированы!');
        }
        return view('user.register');
    }
}
