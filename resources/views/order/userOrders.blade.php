@extends('layouts.app')
@extends('sections.footer')
@section('main')
    <div class="container">
        <h1>Ваши заказы</h1>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Ресторан</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Количество гостей</th>
                    <th>Статус заказа</th>
                    <th>Отмена заказа</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Ресторан</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Количество гостей</th>
                    <th>Статус заказа</th>
                    <th>Отмена заказа</th>
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
                        <td>{{$order->restaurant->name}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->time}}</td>
                        <td>{{$order->guests}}</td>
                        <td>
                            @if ($order->confirm_admin)
                                Принят
                            @else
                                Обрабатывается
                            @endif
                        </td>
                        <td>
                            @if (!$order->cancel_reservation)
                                <a href="{{route('cancelOrder', [ 'id' => $order->id])}}">Отменить</a>
                            @else
                                Отменено
                            @endif
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


Б
