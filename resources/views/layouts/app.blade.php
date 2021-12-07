<html lang="en">
    <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
      <title>Expice</title>
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
      <link rel="stylesheet" href="{{asset('/css/main.css')}}"/>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body>
        @if(Session::has('message'))
            <div class="message-wrapper">
                <div class="message-block alert-info">
                    <div class="message-block__button"><i class="far fa-times-circle"></i></div>
                    <div class="message-block__text">{{ Session::get('message') }}</div>
                </div>
            </div>
        @endif

        <div class="message-wrapper hidden">
            <div class="message-block alert-info">
                <div class="message-block__button"><i class="far fa-times-circle"></i></div>
                <div class="message-block__text"></div>
            </div>
        </div>

        <div class="main-container">
            <header class="header">
                @auth
                <div class="sidebar">
                    <div class="sidebar__item">
                    <div class="user-sidebar">
                        <div class="user-sidebar__icon">
                        <img src="{{asset('images/User-icon.svg')}}" alt="">
                        </div>
                        <div class="user-sidebar__name menu-caret">{{Auth::user()->first_name}}
                        <img src="{{asset('/images/arrowDown.svg')}}" class="menu-caret__icon">
                        <ul class="caret">
                            <li class="caret__item">статус: {{Auth::user()->role->name}}</li>
                            @if (Auth::user()->role->name === 'manager')
                                <li class="caret__item"><a href="{{route('manager')}}"> кабинет менеджера</a></li>
                            @endif
                            @if (Auth::user()->role->name === 'admin')
                                <li class="caret__item"><a href="{{route('admin')}}">админка</a></li>
                            @endif
                            @if (Auth::check())
                                <li class="caret__item"><a href="{{route('logout')}}">выйти</a></li>
                            @endif
                        </ul>
                        </div>
                    </div>
                    </div>
                    <div class="sidebar__item"><a href="{{route('getAllRestaurants')}}">Рестораны</a></div>
                    <div class="sidebar__item"><a href="{{route('product.getAllProducts')}}">Все блюда</a></div>
                    <div class="sidebar__item"><a href="{{route('userOrders', ['id' => Auth::user()->id])}}">История заказов</a></div>
                    <div class="sidebar__item"><a href="#">Свободный слот</a></div>
                </div>
                @endauth
                <div class="container">
                    <div class="row">
                    <div class="col-4 col-lg-2">
                        <a href="{{route('homepage')}}">
                            <div class="logo">
                            expice
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-7 col-lg-4 offset-lg-1">
                        <div class=" menu">
                            <div class="menu__item"><a href="{{route('getAllRestaurants')}}">Рестораны</a></div>
                            <div class="menu__item"><a href="{{route('product.getAllProducts')}}">Все блюда</a></div>
                            @auth
                                <div class="menu__item"><a href="{{route('userOrders', ['id' => Auth::user()->id])}}">История заказов</a></div>
                            @endauth
                            <div class="menu__item"><a href="#">Свободный слот</a></div>
                        </div>
                    </div>
                    <div class="col-1 offset-lg-4">
                        @if (Auth::check())
                            <div class="user-panel">
                                <div class="user-panel__icon">
                                    <img src="{{asset('images/User-icon.svg')}}" alt="">
                                    <div class="user-panel__icon--active"></div>
                                </div>
                                <div class="user-panel__name menu-caret">{{Auth::user()->first_name}}
                                    <img src="{{asset('images/arrowDown.svg')}}" class="menu-caret__icon">
                                    <ul class="caret">
                                        <li class="caret__item">статус: {{Auth::user()->role->name}}</li>
                                        @if (Auth::user()->role->name === 'manager')
                                            <li class="caret__item"><a href="{{route('manager')}}"> кабинет менеджера</a></li>
                                        @endif
                                        @if (Auth::user()->role->name === 'admin')
                                            <li class="caret__item"><a href="{{route('admin')}}">панель администратора</a></li>
                                        @endif
                                        @if (Auth::check())
                                            <li class="caret__item"><a href="{{route('logout')}}">выйти из профиля</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="burger-menu"><img src="{{asset('images/burger-menu.png')}}" alt=""></div>
                        @else
                            <div class="user-panel visibility">
                                <div class="user-panel__icon p-0">
                                    <a href="{{route('login')}}"><img src="{{asset('images/login-icon.png')}}"/></a>
                                </div>
                            </div>
                        @endif
                    </div>
                    </div>
                </div>
            </header>
            <section class="main">
                @yield('main')
            </section>
            @yield('footer')

        </div>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/functions-ES6.js')}}"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('scroll', ()=>{
            if(document.querySelector('body').scrollTop>0){
                document.querySelector('.header').classList.add('header-background');
            } else {
                document.querySelector('.header').classList.remove('header-background');
            }
            })
            var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".button-next",
                prevEl: ".button-prev",
            },
            mousewheel: true,
            keyboard: true,
            });
            if(document.querySelector('.burger-menu')){
                document.querySelector('.burger-menu').addEventListener('click', ()=>{
                    document.querySelector('.sidebar').classList.toggle('sidebar--active');
                    document.querySelector('body').classList.toggle('body--disable');
                })
            }

            let messageButton = document.querySelector('.message-block__button');
            let messageText = document.querySelector('.message-block__text');

            messageButton.addEventListener('click', ()=>{
                messageText.innerHTML = '';
                document.querySelector('.message-wrapper').classList.add('hidden');
            })
        </script>
        @yield('script')

    </body>
  </html>
