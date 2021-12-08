@extends('layouts.admin')

@section('content')

<div class="container">

<h1>Меню</h1>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Стоимость</th>
                <th>Добавлен</th>
                <th>Изменен</th>
                <th>Удалить</th>
                <th>Редактировать</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Стоимость</th>
                <th>Добавлен</th>
                <th>Изменен</th>
                <th>Удалить</th>
                <th>Редактировать</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        {{-- <a href="{{route('deleteProduct',['id' => $product->id])}}">Удалить</a> --}}
                    <button class="delete-button" data-href="{{route('deleteProduct',['id' => $product->id])}}">Удалить <i class="fas fa-trash"></i> </button> </td>
                    <td><a class="edit-button" href="{{route('product.edit',['product' => $product->id])}}">
                        <button>
                            Редактировать <i class="fas fa-edit"></i>
                        </button>
                    </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
    <script>

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('delete-button')) {
                let url = e.target.dataset.href;
                e.target.setAttribute('disabled', 'disabled');
                fetch(url)
                .then(
                        response => {
                            e.target.innerHTML = 'Удалено';
                            let messageText = document.querySelector('.message-block__text');
                            messageText.parentNode.classList.add('alert-success');
                            messageText.parentNode.parentNode.classList.remove('hidden');
                            messageText.innerHTML = 'Удаление прошло успешно';
                        })

            }
        });
    </script>
@endsection
