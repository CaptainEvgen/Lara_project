<?php

namespace App\Http\Services;


use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\UserRepository;

class UserService
{
    protected $userService;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function saveUser($data)
    {
        $validateRules = [
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
            'first_name'=> 'required|max:60|string',
            'last_name'=> 'max:60|string|nullable',
            'telephone_number'=> 'required|max:60|unique:users',
        ];
        $flag = false;
        if(isset($data['name']) && isset($data['location_name'])){
            $validateRules = array_merge($validateRules,[
                'name' => 'required|min:8|unique:restaurants',
                'location_name'=> 'string|nullable',
            ]);
            $flag = true;
        }
        $validated = Validator::make($data, $validateRules)->validate();

        return $this->userRepository->save($validated,$flag);
    }

    public function setEmail($data)
    {
        $validated = Validator::make($data,[
            'email' => 'email',
        ])->validate();

        return $this->userRepository->setEmail($validated);
    }
}
