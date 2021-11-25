<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
