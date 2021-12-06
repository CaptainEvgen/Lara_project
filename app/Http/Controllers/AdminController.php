<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AdminController extends Controller
{
    public function showHomePage() {
        $orders = Order::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $uniqUsers = Order::where('restaurant_id', Auth::user()->restaurant_id)->distinct()->get(['user_id']);

        return view('admin.showHomePage', [
            'orders' => $orders,
            'uniqUsers' => $uniqUsers,
    ]);
    }

    public function getAllByRestaurant($id) {
        $products = Product::where('restaurant_id', $id)->get();

        return view('admin.getAllByRestaurant', ['products' => $products]);
    }

    public function getTableByRestaurant($id) {
        $products = Product::where('restaurant_id', $id)->get();

        return view('admin.getTableByRestaurant', ['products' => $products]);
    }
}
