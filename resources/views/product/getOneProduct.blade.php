@extends('layouts.second')

@section('main')
<div class="container">
    <h1>{{$restaurant}}</h1>
    <div class="good-block mx-auto">
        <div class="good-block__image-block">
        <img src="{{asset($photo)}}" alt="">
        </div>
        <div class="good-block__info">
        <div class="info__text-block">
            <div class="text-block__name">{{$name}}</div>
            <div class="text-block__description">{{$description}}</div>
        </div>
        <div class="info__price"> {{$price}} $</div>
        </div>
    </div>
</div>
@endsection
