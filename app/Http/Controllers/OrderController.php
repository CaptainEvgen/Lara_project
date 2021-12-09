<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderService;
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
        $result = $this->orderService->confirmOrder($id);

        return response()->json($result);
    }

    public function canсelOrder($id)
    {
        $result = $this->orderService->cancelOrder($id);

        return response()->json($result);
    }
}
