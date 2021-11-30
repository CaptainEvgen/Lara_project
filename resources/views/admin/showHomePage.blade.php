@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Постоянные клиенты</div>
                @foreach ($uniqUsers as $uniqUser)
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">{{$uniqUser->user->telephone_number}}</a>
                        <div class="small text-white">
                            всего заказов: {{ $orders
                            ->where('user_id', $uniqUser->user->id)
                            ->where('restaurant_id', Auth::user()->restaurant_id)
                            ->count()}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Проблемные клиенты</div>
                @foreach ($uniqUsers as $uniqUser)
                    @if ($orders->where('user_id', $uniqUser->user->id)
                    ->where('restaurant_id', Auth::user()->restaurant_id)
                    ->where('confirm_admin', true)
                    ->where('cancel_reservation' , true)
                    ->count() > 0)
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">{{$uniqUser->user->telephone_number}}</a>
                            <div class="small text-white">
                                отмененных заказов:
                                {{ $orders->where('user_id', $uniqUser->user->id)
                                ->where('restaurant_id', Auth::user()->restaurant_id)
                                ->where('cancel_reservation' , true)
                                ->where('confirm_admin', true)
                                ->count()}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
