<?php

namespace App\Http\Services;


use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository){
        $this->orderRepository = $orderRepository;
    }

    public function saveOrder($data)
    {
        $validated = Validator::make($data, [
            'restaurant' => 'required',
            'time' => 'nullable',
            'date' => 'date|required|after:today',
            'guests' => 'integer|max:100|min:1',
        ])->validate();

        return $this->orderRepository->save($validated);
    }

    public function getAllByParam($param, $value)
    {
        return $this->orderRepository->getAllByParam($param, $value);
    }

    public function confirmOrder($id)
    {
        return $this->orderRepository->confirmOrder($id);
    }
    public function cancelOrder($id)
    {
        return $this->orderRepository->cancelOrder($id);
    }
}
