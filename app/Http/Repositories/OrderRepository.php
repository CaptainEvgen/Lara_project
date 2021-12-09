<?php

namespace App\Http\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function save($data)
    {
        $order = new $this->order;
            $order->user_id = Auth::user()->id;
            $order->restaurant_id = $data['restaurant'];
            $order->time = $data['time'];
            $order->date = $data['date'];
            $order->guests = $data['guests'];
        $order->save();

        return $order->fresh();
    }

    public function getAllByParam($param, $value)
    {
        $orders = $this->order->where($param, $value)
            ->get();

        return $orders;
    }

    public function confirmOrder($id)
    {
        $order = $this->order->findOrFail($id);
            $order->confirm_admin = true;
        $order->save();

        $order->fresh();
        $changed_at = $order->updated_at;

        return $changed_at;
    }

    public function cancelOrder($id)
    {
        $order = $this->order->findOrFail($id);;
            $order->cancel_reservation = true;
        $order->save();

        $order->fresh();
        $changed_at = $order->updated_at;

        return $changed_at;
    }
}
