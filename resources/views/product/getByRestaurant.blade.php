@extends('layouts.second')

@section('main')
    <h1>Ресторан: {{$restaurant->name}}</h1>
    <div class="showcase__scroll">
        @foreach ($products as $product)
            <a href="{{route('getOneProduct', ['id' => $product->id])}}">
                <div class="good-block">
                    <div class="good-block__image-block">
                    <img src="{{asset($product->photo)}}" alt="">
                    </div>
                    <div class="good-block__info">
                    <div class="info__text-block">
                        <div class="text-block__name">{{$product->name}}</div>
                        <div class="text-block__description">{{$product->description}}</div>
                    </div>
                    <div class="info__price">{{$product->price}} $</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
