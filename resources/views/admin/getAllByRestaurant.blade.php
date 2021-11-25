@extends('layouts.admin')

@section('content')

<div class="container">

    @foreach ($products as $product)
        <div class="flexbox block">
            <div class="block">
                <table class="block_table">
                    <tr>
                        <td>Название продукта</td>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{$product->description}}</td>
                    </tr>
                    <tr>
                        <td>Цена продукта</td>
                        <td>{{$product->price}}</td>
                    </tr>
                    <tr>
                        <td>Изображение</td>
                        <td>{{$product->photo}}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('deleteProduct',['id' => $product->id])}}">Удалить</a></td>
                        <td><a href="{{route('updateProduct',['id' => $product->id])}}">Редактировать</a></td>
                    </tr>
                </table>
            </div>
            <div class="good-block block">
                <div class="good-block__image-block">
                <img src="{{asset($product->photo)}}" alt="">
                </div>
                <div class="good-block__info">
                <div class="info__text-block">
                    <div class="text-block__name">{{$product->name}}</div>
                    <div class="text-block__description">{{$product->description}}</div>
                </div>
                <div class="info__price"> {{$product->price}} $</div>
                </div>
            </div>
        </div>





    @endforeach
</div>

@endsection
