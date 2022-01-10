<?php

namespace App\Http\Repositories;

use Carbon\Carbon;
use App\Models\Order;
use Spatie\GoogleCalendar\Event;
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

        $event = new Event;
        $event->description = $data['guests'].' guests. Tel: '.Auth::user()->telephone_number.' Order on: '.$data['date'].'/'.$data['time'];
        $event->name = Auth::user()->first_name.''.Auth::user()->last_name;
        // $event->startDateTime = Carbon::now();
        // $event->endDateTime = Carbon::now()->addHour();
        $event->startDateTime = Carbon::parse($data['date'].' '.$data['time']);
        $event->endDateTime = (clone $event->startDateTime)->addHour();
        // dd($event->startDateTime);
        $event->save();

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
