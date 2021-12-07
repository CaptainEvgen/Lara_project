<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
    {
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'photo',
        'restaraunt_id',
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
