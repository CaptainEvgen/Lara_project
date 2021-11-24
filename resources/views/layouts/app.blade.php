
<html lang="en">
    <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
      <title>Expice</title>
      <script src="js/libs.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

      <link rel="stylesheet" href="{{asset('/css/main.css')}}"/>
    </head>
    <body>
      <div class="main-container">
        <header class="header">
          <div class="sidebar">
            <div class="sidebar__item">
              <div class="user-sidebar">
                <div class="user-sidebar__icon">
                  <img src="images/User icon.svg" alt="">
                </div>
                <div class="user-sidebar__name menu-caret">{{Auth::user()->first_name}}
                  <img src="images/arrowDown.svg" class="menu-caret__icon">
                  <ul class="caret">
                    <li class="caret__item">User 1</li>
                    <li class="caret__item">User 2</li>
                    <li class="caret__item">User 3</li>
                    <li class="caret__item">User 4</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="sidebar__item"><a href="#">Menu One</a></div>
            <div class="sidebar__item"><a href="#">Menu Two</a></div>
            <div class="sidebar__item"><a href="#">Menu Three</a></div>
            <div class="sidebar__item"><a href="#">Menu Four</a></div>
          </div>
          <div class="container">
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
                        <li class="caret__item">User 1</li>
                        <li class="caret__item">User 2</li>
                        <li class="caret__item">User 3</li>
                        <li class="caret__item">User 4</li>
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
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        </header>

        <main class="main">
          <section class="food-section">
            <div class="container">
              <div class="row">
                    <div class="col-12 col-lg-6">
                      <div class="description-block">
                        <div class="description-block__main-para">Food</div>
                        <div class="description-block__secondary-para">Discover Restaurant & Delicious Food</div>
                        <div class="search-block">
                          <input type="text" class="search-block__input" placeholder="Search Restaurant, Food">
                          <button class="search-block__button">go</button>
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
                            <img src="images/Left carousel.png" alt="" class="prev">
                          </div>
                          <div class="button-next">
                            <img src="images/Right carousel.png" alt="" class="next">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            <div class="location-block">
              <img src="images/location.svg" class="location-block__image">
              <div class="location-block__name">Rajshahi</div>
            </div>
          </section>
          <section class="top-restaurants">
            <div class="container">
              <div class="top-restaurants__description">
                <div class="row">
                  <div class="col-lg-6 flexbox">
                    <div class="important-block"></div>
                    <div class="main-para">
                      <div class="main-para__text-block">
                        some top restaurant for dining in or Take away!
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="second-para">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt. Volutpat metus id amet, nam hac magna accumsan. Nascetur ac tortor purus ultrices morbi tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="restaurant-preview">
                <div class="preview-block first-block">
                  <div class="preview-block__info">
                    <div class="preview-block__info-name">Fire Water</div>
                    <div class="preview-block__info-description">we are all about we are all about to the fullest and all content dining out or in!dining out or in!</div>
                    <div class="preview-block__info-location">
                      <img src="images/location.svg" class="location-block__image">
                      <div class="location-name">New Market
                    </div>
                  </div>
                    <div class="preview-block__info-button">Book Now</div>
                  </div>
                </div>
                <div class="preview-block second-block">
                  <div class="preview-block__info">
                    <div class="preview-block__info-name">The Wonton </div>
                    <div class="preview-block__info-description">we are all about we are all about to the fullest and all content dining out or in!dining out or in!</div>
                    <div class="preview-block__info-location">
                      <img src="images/location.svg" class="location-block__image">
                      <div class="location-name">Saheb Bazar</div>
                    </div>
                    <div class="preview-block__info-button">Book Now</div>
                  </div>
                </div>
                <div class="restaurant-preview__button">
                  <a href="#!">
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
              <div class="booking-table__item input-block">
                <input type="text" class="table-input" placeholder="search restrurent">
                <div class="table-button">go</div>
              </div>
              <div class="booking-table__item">
                <div class="table-info">
                  <div class="table-info__block">
                    <div class="input-label">Date</div>
                  <input type="date" class="block-input">
                  </div>
                  <div class="table-info__block">
                    <div class="input-label"> Time</div>
                  <input type="time" class="block-input">
                  </div>
                  <div class="table-info__block">
                    <div class="input-label">Guests</div>
                  <input type="number" placeholder="3 People" maxlength="2" class="block-input">
                  </div>
                </div>
              </div>
            </div>
            <img src="images/leftSalad.png" alt="" class="left-salad">
            <img src="images/rightSalad.png" alt="" class="right-salad">
          </section>
          <section class="services">
            <div class="container">
              <div class="services__description">
                <div class="row">
                  <div class="col-lg-4 flexbox">
                    <div class="important-block"></div>
                    <div class="main-para">
                      <div class="main-para__text-block">
                        Our Services
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="second-para">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt. Volutpat metus id amet, nam hac magna accumsan. Nascetur ac tortor purus ultrices morbi tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed.
                    </div>
                  </div>
                </div>


              </div>

            </div>
            <div class="services-block">
              <div class="row">
                <div class="col-lg-7">
                  <div class="services-block__secondary">
                    <div class="services-block__secondary-block">
                      <div class="secondary__image-block">
                        <img src="images/tablebooking.png">
                      </div>
                      <div class="secondary__text-block">
                        <div class="text-block__main">advanced table
                          booking <div class="red-line"></div></div>
                        <div class="text-block__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                      </div>
                      <img src="images/servicesArrow.png" alt="" class="services-block__arrow1">
                    </div>
                    <div class="services-block__secondary-block">
                      <div class="secondary__text-block">
                        <div class="text-block__main">Food For Free <div class="red-line"></div>
                          24/7</div>
                        <div class="text-block__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
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
                      <div class="text-block__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                      <div class="main__text-block__red-line"></div>
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
                <div class="description__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt. Volutpat metus id amet.</div>
              </div>
              <div class="showcase__scroll">
                <div class="good-block">
                  <div class="good-block__image-block">
                    <img src="images/good1.png" alt="">
                  </div>
                  <div class="good-block__info">
                    <div class="info__text-block">
                      <div class="text-block__name">Hand Sandwich</div>
                      <div class="text-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing. </div>
                    </div>
                    <div class="info__price">$10.25</div>
                  </div>
                </div>
                <div class="good-block">
                  <div class="good-block__image-block">
                    <img src="images/good2.png" alt="">
                  </div>
                  <div class="good-block__info">
                    <div class="info__text-block">
                      <div class="text-block__name">Hand Sandwich</div>
                      <div class="text-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing. </div>
                    </div>
                    <div class="info__price">$10.25</div>
                  </div>
                </div>
                <div class="good-block">
                  <div class="good-block__image-block">
                    <img src="images/good3.png" alt="">
                  </div>
                  <div class="good-block__info">
                    <div class="info__text-block">
                      <div class="text-block__name">Hand Sandwich</div>
                      <div class="text-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing. </div>
                    </div>
                    <div class="info__price">$10.25</div>
                  </div>
                </div>
                <div class="good-block">
                  <div class="good-block__image-block">
                    <img src="images/good4.png" alt="">
                  </div>
                  <div class="good-block__info">
                    <div class="info__text-block">
                      <div class="text-block__name">Hand Sandwich</div>
                      <div class="text-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing. </div>
                    </div>
                    <div class="info__price">$10.25</div>
                  </div>
                </div>
                <div class="good-block">
                  <div class="good-block__image-block">
                    <img src="images/good5.png" alt="">
                  </div>
                  <div class="good-block__info">
                    <div class="info__text-block">
                      <div class="text-block__name">Hand Sandwich</div>
                      <div class="text-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing. </div>
                    </div>
                    <div class="info__price">$10.25</div>
                  </div>
                </div>
                <div class="good-block">
                  <div class="good-block__image-block">
                    <img src="images/good6.png" alt="">
                  </div>
                  <div class="good-block__info">
                    <div class="info__text-block">
                      <div class="text-block__name">Hand Sandwich</div>
                      <div class="text-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing. </div>
                    </div>
                    <div class="info__price">$10.25</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="download">
            <div class="container">
              <div class="row">
                <div class="col-lg-5">
                  <div class="download-block">
                    <div class="download-block__text-block">
                      <div class="important-block"></div>
                      <div class="main-para">
                        <div class="main-para__text-block">
                          Download app for Exciting Deals
                        </div>
                      </div>
                    </div>
                    <div class="download-block__description">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed phasellus senectus. Ut tellus donec vestibulum tristique leo bibendum in a, tincidunt.
                    </div>
                    <div class="download-block__apps-block">
                      <div class="apps-block__GP" >
                        <a href="#"><img src="images/Google Play Btn.png" alt=""></a>
                      </div>
                      <div class="apps-block__AS">
                        <a href="#"><img src="images/Apple Store.png" alt=""></a>
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
        </main>
        <footer class="footer">
            <div class="footer-main-block">
              <div class="footer-main-block__name">Get notified <br>
                about new amazing products</div>
              <div class="footer-main-block__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est, adipiscing cursus auctor eget sed phasellus senectus. </div>
              <div class="footer-input-block">
                <input type="email" class="footer-input-block__input" placeholder="E-mail">
                <div class="footer-input-block__button">
                  <img src="images/rightArrowMini.png" alt="">
                </div>
              </div>
              <div class="anchor-block">
                <div class="anchor-block__item">Product </div>
                <div class="anchor-block__item">Company</div>
                <div class="anchor-block__item">Learn more</div>
                <div class="anchor-block__item">Get in touch </div>
              </div>
            </div>
            <div class="footer-secondary-block">
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
            <img src="images/footerBcg.png" alt="" class="footerBcg">
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

        document.addEventListener('scroll', ()=>{
          if(document.querySelector('body').scrollTop>0){
            document.querySelector('.header').classList.add('header-background');
          } else {
            document.querySelector('.header').classList.remove('header-background');
          }
        })
      </script>
    </body>
  </html>
