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
                        canceled
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
                                {{-- <a href="{{route('cancelOrder', [ 'id' => $order->id])}}">Отменить</a> --}}
                                <div class="buttonCancel" data-id="{{$order->id}}">Отменить</div>
                            @else
                               Заказ отменен ({{$order->updated_at}})
                            @endif
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>

        let text = 'Отменено';
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('buttonCancel')) {
                let id = e.target.dataset.id;
                let url = '/cancel/' + id;
                let parentN = e.target.parentNode;
                fetch(url)
                    .then(
                        response => {
                            console.log(e.target.parentNode.parentNode);
                            e.target.parentNode.parentNode.classList.remove('pending');
                            e.target.parentNode.parentNode.classList.remove('confirmed');
                            e.target.parentNode.parentNode.classList.add('canceled');
                            parentN.innerHTML = text;
                            return response.json();
                        }
                    )
                    .then(
                        json => {
                            let data = new Date(json).toLocaleString('en-US');

                            parentN.innerHTML += '('+ data+')';
                        }
                    );
            }
        });

    </script>
@endsection
