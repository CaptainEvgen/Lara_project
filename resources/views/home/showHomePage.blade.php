@extends('layouts.app')
@section('main')
    <section class="food-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="description-block">
                        <div class="description-block__main-para">Food</div>
                        <div class="description-block__secondary-para">Discover Restaurant & Delicious Food</div>

                        <form action="" method="post" id="searchForm">
                            @csrf
                            <div class="search-block">
                                <input type="text" class="search-block__input" autocomplete="off"
                                    placeholder="Search Restaurant, Food" name="text">
                                <input type="submit" class="search-block__button" value="go">
                            </div>
                        </form>
                        <div class="search-list">

                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-6 carousel-wrapper">
                    <div class="row">
                        <div class="col-6">
                            <div class="bg-block"></div>
                            <div class="bg-block"></div>
                        </div>
                    </div>
                    <div class="mySwiper carousel">
                        <div class="swiper-wrapper slides">
                            <div class="swiper-slide slide">
                                <img src="images/salad.png" class="slide__BGimg">
                                <img src="images/dish.png" class="slide__img">
                            </div>
                            <div class="swiper-slide slide">
                                <img src="images/salad.png" class="slide__BGimg">
                                <img src="images/dish.png" class="slide__img rotate">
                            </div>
                            <div class="swiper-slide slide">
                                <img src="images/salad.png" class="slide__BGimg">
                                <img src="images/dish.png" class="slide__img rotate">
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="button-prev">
                                <img src="{{ asset('images/Left-carousel.png') }}" alt="" class="prev">
                            </div>
                            <div class="button-next">
                                <img src="{{ asset('images/Right-carousel.png') }}" alt="" class="next">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="location-block">
            <img src="images/location.svg" class="location-block__image">
            <div class="location-block__name">{{ Location::get()->cityName }}</div>
        </div>
    </section>
    <section class="top-restaurants">
        <div class="container">
            <div class="top-restaurants__description">
                <div class="row">
                    <div class="col-lg-6 flexbox">

                        <div class="main-para">
                            <div class="main-para__text-block">
                                some top restaurant for dining in or Take away!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="second-para">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed
                            phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt. Volutpat
                            metus id amet, nam hac magna accumsan. Nascetur ac tortor purus ultrices morbi tellus. Lorem
                            ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="restaurant-preview">
            @foreach ($res as $re)
                <div class="preview-block">
                    <img src="{{ asset('images/firewatterimg.png') }}" class="preview-block__image">
                    <div class="preview-block__info">
                        <div class="preview-block__info-name">{{ $re->name }}</div>
                        <div class="preview-block__info-description">we are all about we are all about to the fullest and
                            all content dining out or in!dining out or in!</div>
                        <div class="preview-block__info-location">
                            <img src="images/location.svg" class="location-block__image">
                            <div class="location-name">{{ $re->location_name }}</div>
                        </div>
                        <a href="{{ route('byRestaurant', ['id' => $re->id]) }}">
                            <div class="preview-block__info-button">???????????? ????????</div>
                        </a>
                    </div>
                </div>
            @endforeach

            <div class="restaurant-preview__button">
                <a href="{{ route('getAllRestaurants') }}">
                    <img src="images/seemore1.png" class="restaurant-preview__button-image">
                    <div class="restaurant-preview__button-text">see more</div>
                </a>
            </div>
        </div>
    </section>
    <section class="booking">
        <div class="booking-table">
            <div class="booking-table__item">
                <div class="table-line"></div>
            </div>
            <div class="booking-table__item">
                <div class="table-name">
                    advance booking
                </div>
            </div>
            {{-- @if ($errors->any())
                    <h4 class="validation-fail"> {{$errors->first()}}</h4>
                @endif --}}
            <div class="fetch">
            </div>
            <form action="{{ route('makeOrder') }}" method="post" id="orderForm">
                @csrf
                <div class="booking-table__item input-block">
                    <select class="form-control table-input" name="restaurant" value="{{ old('restaurant') }}">
                        <option>search restraurant</option>
                        @foreach ($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach
                    </select>
                    <input name="submit" type="submit" class="table-button" value="go">
                </div>
                <div class="booking-table__item">
                    <div class="table-info">
                        <div class="table-info__block">
                            <div class="input-label">Date</div>
                            <input type="date" class="block-input" name="date" value="{{ old('date') }}">
                        </div>
                        <div class="table-info__block">
                            <div class="input-label"> Time</div>
                            <input type="time" class="block-input" name="time" value="{{ old('time') }}">
                        </div>
                        <div class="table-info__block">
                            <div class="input-label">Guests</div>
                            <input type="number" placeholder="2 People" maxlength="2" class="block-input" name="guests"
                                value="{{ old('guests') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <img src="images/leftSalad.png" alt="" class="left-salad">
        <img src="images/rightSalad.png" alt="" class="right-salad">
    </section>

    <section class="services">
        <div class="container">
            <div class="services__description">
                <div class="row">
                    <div class="col-lg-4 flexbox">
                        <div class="main-para">
                            <div class="main-para__text-block">
                                Our Services
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="second-para">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed
                            phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt. Volutpat
                            metus id amet, nam hac magna accumsan. Nascetur ac tortor purus ultrices morbi tellus. Lorem
                            ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed.
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="services-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="services-block__secondary">
                            <div class="services-block__secondary-block">
                                <div class="secondary__image-block">
                                    <img src="images/tablebooking.png">
                                </div>
                                <div class="secondary__text-block">
                                    <div class="text-block__main">advanced table
                                        booking <div class="red-line"></div>
                                    </div>
                                    <div class="text-block__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <img src="images/servicesArrow.png" alt="" class="services-block__arrow1">
                            </div>
                            <div class="services-block__secondary-block">
                                <div class="secondary__text-block">
                                    <div class="text-block__main">Food For Free <div class="red-line"></div>
                                        24/7</div>
                                    <div class="text-block__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="secondary__image-block">
                                    <img src="images/foodforfree.png">
                                </div>
                                <img src="images/servicesArrow.png" alt="" class="services-block__arrow2">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="services-block__main-block">
                            <img src="images/delivery.png">
                            <div class="main__text-block">
                                <div class="text-block__main">free home delivery
                                    at your door steps</div>
                                <div class="text-block__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="main__text-block__red-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="showcase">
        <div class="container">
            <div class="showcase__description">
                <div class="description__name">Explore Our Foods</div>
                <div class="description__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing
                    cursus auctor eget sed phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a,
                    tincidunt. Volutpat metus id amet.</div>
            </div>
            <div class="showcase__scroll">
                @foreach ($products as $product)
                    <a href="{{ route('getOneProduct', ['id' => $product->id]) }}">
                        <div class="good-block">
                            <div class="good-block__image-block">
                                <img src="{{ asset($product->photo) }}" alt="">
                            </div>
                            <div class="good-block__info">
                                <div class="info__text-block">
                                    <div class="text-block__name">{{ $product->name }}</div>
                                    <div class="text-block__description">{{ $product->description }}</div>
                                </div>
                                <div class="info__price">{{ $product->price }} $</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="download">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="download-block">
                        <div class="download-block__text-block">
                            <div class="main-para">
                                <div class="main-para__text-block">
                                    Download app for Exciting Deals
                                </div>
                            </div>
                        </div>
                        <div class="download-block__description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed
                            phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt.
                        </div>
                        <div class="download-block__apps-block">
                            <div class="apps-block__GP">
                                <a href="https://play.google.com/store/apps?gl=UA"><img
                                        src="{{ asset('images/Google-Play-Btn.png') }}" alt=""></a>
                            </div>
                            <div class="apps-block__AS">
                                <a href="https://www.apple.com/ua/app-store/"><img
                                        src="{{ asset('images/Apple-Store.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="SP-image">
                        <img src="images/rightSalad.png" alt="" class="SP-image__bcg">
                        <img src="images/smartphone.png" alt="" class="SP-image__phone">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <footer class="footer">
        <div class="footer-main-block">
            <div class="footer-main-block__name">add your mail<br>
                to follow the news</div>
            <div class="footer-main-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est,
                adipiscing cursus auctor eget sed phasellus senectus. </div>
            <form action="{{ route('setEmail') }}" method="post" id="emailForm">
                @csrf
                <div class="footer-input-block">
                    <input type="email" class="footer-input-block__input" placeholder="E-mail" name="email">
                    <button class="footer-input-block__button" type='submit'>
                        <img src="images/rightArrowMini.png" alt="">
                    </button>
                </div>
            </form>
            <div class="email-message"></div>
            <div class="anchor-block">
                <div class="anchor-block__item">Product </div>
                <div class="anchor-block__item">Company</div>
                <div class="anchor-block__item">Learn more</div>
                <div class="anchor-block__item">Get in touch </div>
            </div>
        </div>
        <div class="footer-secondary-block">
            <div class="networks-block">
                <a class="networks-block__item" href="#">
                    <img src="images/Facebook.png" alt="">
                </a>
                <a class="networks-block__item" href="#">
                    <img src="images/Twitter.png" alt="">
                </a>
                <a class="networks-block__item" href="#">
                    <img src="images/Linkedin.png" alt="">
                </a>
                <a class="networks-block__item" href="#">
                    <img src="images/Behance.png" alt="">
                </a>
            </div>
            <div class="copyright">&copy; 2020 Expice Studio</div>
        </div>
        <img src="images/footerBcg.png" alt="" class="footerBcg">
    </footer>
@endsection

@section('script')
    <script>
        let message = document.querySelector('.fetch');
        let form = document.querySelector('#orderForm');
        let url = "{{ route('makeOrder') }}";
        let text = '?????????? ?????????????? ????????????????';
        fetchSendForm(form, url, message, text);

        let iMessage = document.querySelector('.search-list');
        let iUrl = "{{ route('search') }}";
        let input = document.querySelector('.search-block__input');
        let token = '{{ csrf_token() }}';
        fetchSearchInput(input, iUrl, iMessage, token);

        let eMessage = document.querySelector('.email-message');
        let eForm = document.querySelector('#emailForm');
        let eUrl = "{{ route('setEmail') }}";
        let eText = 'Email ?????????????? ????????????????';
        fetchSendForm(eForm, eUrl, eMessage, eText);
    </script>
@endsection
