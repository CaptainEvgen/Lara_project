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
                    <td><a href="{{route('deleteProduct',['id' => $product->id])}}">Удалить</a></td>
                    <td><a href="{{route('updateProduct',['id' => $product->id])}}">Редактировать</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
