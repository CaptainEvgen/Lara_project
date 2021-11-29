<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showHomePage(){
        return view('layouts.admin');
    }
    public function getAllByRestaurant($id){
        $products = Product::where('restaurant_id', $id)->get();
        return view('admin.getAllByRestaurant', ['products' => $products]);
    }
    public function getTableByRestaurant($id){
        $products = Product::where('restaurant_id', $id)->get();
        return view('admin.getTableByRestaurant', ['products' => $products]);
    }
}
