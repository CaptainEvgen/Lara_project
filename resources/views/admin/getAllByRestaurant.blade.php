@extends('layouts.admin')

@section('content')

<div class="container">

    @foreach ($products as $product)
        <div class="manager-product-view">

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
                        <td><img class="table-image" src="{{asset($product->photo)}}" alt=""> </td>
                    </tr>
                    <tr>
                        <td>
                            {{-- <a href="{{route('deleteProduct',['id' => $product->id])}}">Удалить</a> --}}
                            <button class="delete-button" data-href={{route('deleteProduct',['id' => $product->id])}}>Удалить <i class="fas fa-trash"></i> </button>
                        </td>
                        <td><a href="{{route('product.edit',['product' => $product->id])}}">
                            <button>
                                Редактировать <i class="fas fa-edit"></i>
                            </button>
                        </a></td>
                    </tr>
                </table>

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

@section('script')

    <script>
        let deleteButtons = document.querySelectorAll('.delete-button');

        for(let deleteButton of deleteButtons){
            fetchDeleteButton(deleteButton);
        }
    </script>

@endsection
