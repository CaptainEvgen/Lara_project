@extends('layouts.admin');

@section('content')
<div class="container">
    <h1>Заказы ресторана {{Auth::user()->restaurant->name}}}</h1>
    @if ($orders)
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Номер телефона</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Количество гостей</th>
                    <th>Статус заказа</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Номер телефона</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Количество гостей</th>
                    <th>Статус заказа</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="
                    @if ($order->cancel_reservation)
                        canseled
                    @else
                        @if ($order->confirm_admin)
                            confirmed
                        @else
                            pending
                        @endif
                    @endif
                    ">
                        <td>{{$order->user->last_name}}</td>
                        <td>{{$order->user->first_name}}</td>
                        <td>{{$order->user->telephone_number}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->time}}</td>
                        <td>{{$order->guests}}</td>
                        <td>
                            @if ($order->confirm_admin)
                                Принят ({{$order->updated_at}})
                            @else
                               Не обработан (<a href="{{route('confirmOrder',[ 'id' => $order->id])}}">Принять</a>)
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
