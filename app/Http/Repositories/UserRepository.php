<?php

namespace App\Http\Repositories;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save($data,$flag)
    {
        $user = new $this->user;
        if($data['password'] === $data['password_confirmation']){
            $user->password = Hash::make($data['password']);
        }
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->telephone_number = $data['telephone_number'];

        if($flag){
            $user->role_id = 2;

            $restaurant = new Restaurant;
                $restaurant->name = $data['name'];
                $restaurant->location_name = $data['location_name'];
            $restaurant->save();

            $id = $restaurant->fresh()->id;
            $user->restaurant_id = $id;
        }

        $user->save();
        $user->fresh();

        return $user;
    }

    public function setEmail($data)
    {
        $user = $this->user->findOrFail(Auth::user()->id);
            $user->email = $data['email'];
        $user->save();

        $user->fresh();

        return $user;
    }
}
