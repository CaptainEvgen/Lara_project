@extends('layouts.app')
@extends('sections.footer')
@section('main')
    <div class="restaurant-preview middle">
        @foreach ($restaurants as $restaurant)
                <div class="preview-block">
                    <img src="{{asset('/images/firewatterimg.png')}}" class="preview-block__image">
                    <div class="preview-block__info">
                    <div class="preview-block__info-name">{{$restaurant->name}}</div>
                    <div class="preview-block__info-description">{{$restaurant->name}} we are all about we are all about to the fullest and all content dining out or in!dining out or in!</div>
                    <div class="preview-block__info-location">
                        <img src="images/location.svg" class="location-block__image">
                        <div class="location-name">{{$restaurant->location_name}}</div>
                    </div>
                    <a href="{{route('byRestaurant', ['id' => $restaurant->id])}}"><div class="preview-block__info-button">Список блюд</div></a>
                    </div>
                </div>
        @endforeach
    </div>
@endsection

