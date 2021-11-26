<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function makeOrder(Request $request){
        $data = $request->validate([
            'restaurant' => 'required',
            'time' => 'nullable',
            'date' => 'date|required|after:today',
            'guests' => 'integer|max:100|min:1',
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->restaurant_id = $data['restaurant'];
        $order->time = $data['time'];
        $order->date = $data['date'];
        $order->guests = $data['guests'];
        $order->save();
        return redirect()->route('homepage')->with('message', 'Ваш заказ принят. Дождитесь подтверждения от администратора ресторана.');
    }
}
