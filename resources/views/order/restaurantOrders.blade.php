@extends('layouts.admin');

@section('content')
<div class="container">
    <h1>Заказы ресторана {{Auth::user()->restaurant->name}}</h1>
    @if ($orders)
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
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
                    <th>ID</th>
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
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->last_name}}</td>
                        <td>{{$order->user->first_name}}</td>
                        <td>{{$order->user->telephone_number}}
                        @if ($orders
                        ->where('user_id', $order->user->id)
                        ->where('restaurant_id', Auth::user()->restaurant_id)
                        ->count() > 5)
                            <i class="fas fa-crown"></i>
                        @endif
                        @if($orders->where('user_id', $order->user->id)
                        ->where('restaurant_id', Auth::user()->restaurant_id)
                        ->where('cancel_reservation' , true)
                        ->count() >= 5)
                            <i class="fas fa-exclamation"></i>
                        @endif</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->time}}</td>
                        <td>{{$order->guests}}</td>
                        <td>
                            @if ($order->confirm_admin)
                                Принят ({{$order->updated_at}})
                            @else
                                <a class="buttonConfirm" data-id="{{$order->id}}">Не обработан</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
@section('script')
    <script>

        let text = 'Заказ принят';
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('buttonConfirm')) {
                let id = e.target.dataset.id;
                let url = '/manager/confirm/' + id;
                fetch(url)
                    .then(
                        response => {
                            e.target.innerHTML = text;
                        }
                    );
            }
        });

    </script>
@endsection

