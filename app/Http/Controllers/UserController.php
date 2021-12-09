<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

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
            $data = $request->all();

            $result['status'] = 200;

            try {
                $result['data'] = $this->userService->saveUser($data);
            } catch (ValidationException $e) {
                $result = [
                    'status' => 500,
                    'message' =>$e->getMessage(),
                    'errors' =>$e->errors(),
                ];
            }

            return response()->json($result, $result['status']);
        }

        return view('user.register');
    }
}
