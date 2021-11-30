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
        // return redirect()->route('homepage')->with('message', 'Ваш заказ принят. Дождитесь подтверждения от администратора ресторана.');
        // return response()->json(['message'=>'Form is successfully submitted!']);
    }
    public function userOrders($id){
        $orders = Order::where('user_id', $id)
            ->get();
        return view('order.userOrders', [
            'orders' => $orders,
        ]);
    }
    public function restaurantOrders($id){
        $orders = Order::where('restaurant_id', $id)
        ->get();
        return view('order.restaurantOrders', [
            'orders' => $orders,
        ]);
    }
    public function confirmOrder($id){
        $order = Order::where('id', $id)
        ->first();
        $order->confirm_admin = true;
        $order->save();

        //return redirect()->route('restaurantOrders',['id' => Auth::user()->restaurant_id])->with('message', 'Вы приняли заказ № '.$id);
    }
    public function canсelOrder($id){
        $order = Order::where('id', $id)
        ->first();
        $order->cancel_reservation = true;
        $order->save();
        return redirect()->route('userOrders',['id' => Auth::user()->id])->with('message', 'Вы отменили заказ № '.$id);
    }
}
