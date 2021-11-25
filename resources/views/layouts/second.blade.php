
<html lang="en">
    <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
      <title>Expice</title>
      <script src="js/libs.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
      <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    </head>
    <body>
      <div class="main-container">
        <header class="header relative">
            @auth
            <div class="sidebar">
                <div class="sidebar__item">
                  <div class="user-sidebar">
                    <div class="user-sidebar__icon">
                      <img src="{{asset('images/User icon.svg')}}" alt="">
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
                <div class="sidebar__item"><a href="#">Menu One</a></div>
                <div class="sidebar__item"><a href="#">Menu Two</a></div>
                <div class="sidebar__item"><a href="#">Menu Three</a></div>
                <div class="sidebar__item"><a href="#">Menu Four</a></div>
              </div>
            @endauth
          <div class="container">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="row">
              <div class="col-4 col-lg-2">
                <div class="logo">
                  expice
                </div>
              </div>
              <div class="col-6 col-sm-7 col-lg-4 offset-lg-1">
                <div class=" menu">
                  <div class="menu__item"><a href="#">Menu One</a></div>
                  <div class="menu__item"><a href="#">Menu Two</a></div>
                  <div class="menu__item"><a href="#">Menu Three</a></div>
                  <div class="menu__item"><a href="#">Menu Four</a></div>
                </div>
              </div>
              <div class="col-1 offset-lg-4">
                  @if (Auth::check())
                    <div class="user-panel">
                        <div class="user-panel__icon">
                            <img src="images/User icon.svg" alt="">
                            <div class="user-panel__icon--active"></div>
                        </div>
                        <div class="user-panel__name menu-caret">{{Auth::user()->first_name}}
                            <img src="images/arrowDown.svg" class="menu-caret__icon">
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
                    <div class="burger-menu"><img src="images/burger-menu.png" alt=""></div>
                  @else
                    <div class="user-panel__icon p-0">
                        <a href="{{route('login')}}"><img src="https://img.icons8.com/ios/50/000000/login-rounded-right--v1.png"/></a>
                    </div>
                  @endif
              </div>
            </div>
          </div>
        </header>
        @section('main')

        @show
        <footer class="footer">
            <div class="footer-secondary-block">
                <div class="anchor-block">
                    <div class="anchor-block__item">Product </div>
                    <div class="anchor-block__item">Company</div>
                    <div class="anchor-block__item">Learn more</div>
                    <div class="anchor-block__item">Get in touch </div>
                </div>
              <div class="networks-block">
                <a href="#">
                  <div class="networks-block__item">
                    <img src="images/Facebook.png" alt="">
                  </div>
                </a>
                <a href="#">
                  <div class="networks-block__item">
                    <img src="images/Twitter.png" alt="">
                  </div>
                </a>
                <a href="#">
                  <div class="networks-block__item">
                    <img src="images/Linkedin.png" alt="">
                  </div>
                </a>
                <a href="#">
                  <div class="networks-block__item">
                    <img src="images/Behance.png" alt="">
                  </div>
                </a>
              </div>
              <div class="copyright">&copy; 2020 Expice Studio</div>
            </div>
        </footer>
      </div>
      <script src="js/main.js"> </script>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
      <script>
        var swiper = new Swiper(".mySwiper", {
          cssMode: true,
          navigation: {
            nextEl: ".button-next",
            prevEl: ".button-prev",
          },
          mousewheel: true,
          keyboard: true,
        });

        document.querySelector('.burger-menu').addEventListener('click', ()=>{
          document.querySelector('.sidebar').classList.toggle('sidebar--active');
          document.querySelector('body').classList.toggle('body--disable');
        })

        // document.addEventListener('scroll', ()=>{
        //   if(document.querySelector('body').scrollTop>0){
        //     document.querySelector('.header').classList.add('header-background');
        //   } else {
        //     document.querySelector('.header').classList.remove('header-background');
        //   }
        // })
      </script>
    </body>
  </html>
