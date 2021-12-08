<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }

    public function makeOrder(Request $request)
    {
        $data = $request->all();

        $result['status'] = 200;

        try {
            $result['data'] = $this->orderService->saveOrder($data);
        } catch (ValidationException $e) {
            $result = [
                'status' => 500,
                'message' =>$e->getMessage(),
                'errors' =>$e->errors(),
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function userOrders($id)
    {
        $orders = $this->orderService->getAllByParam('user_id', $id);

        return view('order.userOrders', [
            'orders' => $orders,
        ]);
    }

    public function restaurantOrders($id)
    {
        $orders = $this->orderService->getAllByParam('restaurant_id', $id);

        return view('order.restaurantOrders', [
            'orders' => $orders,
        ]);
    }

    public function confirmOrder($id)
    {
        $order = Order::where('id', $id)
        ->first();
        $order->confirm_admin = true;
        $order->save();
        $orderNew = Order::where('id', $id)->first();
        $changed_at = $orderNew->updated_at;

        return response()->json($changed_at);
    }

    public function canсelOrder($id)
    {
        $order = Order::where('id', $id)
        ->first();
        $order->cancel_reservation = true;
        $order->save();

        return redirect()->route('userOrders',['id' => Auth::user()->id])->with('message', 'Вы отменили заказ № '.$id);
    }
}
