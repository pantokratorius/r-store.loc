<!DOCTYPE html>
<html>
<head>
  <!-- meta -->
  <meta charset="UTF-8" />
  <meta name="keywords" content="iPhone" />
  <title>iPhone – купить в интернет-магазине по лучшей цене</title>
  <meta name="description" content="iPhone" />
  <meta name="robots" content="index,follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- icons-->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon1.png') }}">
  <script src="{{asset('assets/js/jquery.js')}}"></script>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


  {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"
    type="text/css"> --}}
@vite(['resources/css/app.scss',  'resources/js/app.js'])
</head>

<body class="fhg-body">
        @if (Session::has('success'))
        <div class="ajs-message ajs-success ajs-visible">{{ Session::get('success') }}</div>
      @endif
  <div class="body-wrapper">


@include('mobile_menu')

    <div class="top-panel-wrapper">
      <div class="container">
        <div class="top-panel row js-top-panel-fixed">

          <div class="top-menu-wrapper hidden shown-sm button_mobile_menu">
            <button type="button" class="top-panel-open-sidebar button  js-open-sidebar">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"></path>
                </svg>
            </button>
          </div>

          <div class="top-menu-icons-block collapse-block hide show-sm cell-">
            <div class="contacts-top-menu hidden shown-sm">


              <button type="button" class="contacts-icon js-open-contacts"></button>


              <div class="contacts-top-menu-block cell-12 hidden">
                <div class="header-block js-contacts-header cell- ">


                  <div class="email text-left ">

                  </div>

                  <div class="phone text-left ">

                    <a href="tel:+7(967)307-01-00" class="contact-link tel">
                      +7(967)307-01-00
                    </a>
                    <br><a class="backcall-toggle js-backcall-toggle">Обратный звонок</a>

                  </div>

                </div>

              </div>
            </div>

            <div class="hidden shown-sm">
              <button type="button" class="top-panel-open-search button js-open-search-panel shown-sm"></button>
            </div>

            <div class="shopcart-widget-wrapper is-top-panel cell-  hidden shown-sm">

              <div class="shopcart-widget is-top-panel ">
                <a href="{{ route('cart') }}" title="Корзина" class="shopcart-widget-link ">
                  <span class="shopcart-widget-icon">
                    <span class="shopcart-widget-count js-shopcart-widget-count is-top-panel">{{ $cart_count }}</span>
                  </span>
                  <span class="shopcart-widget-data">
                    <span class="shopcart-widget-caption">
                      Корзина
                    </span>

                    <span class="shopcart-widget-amount js-shopcart-widget-amount hidden-md">{{  $cart_price }}&nbsp;руб</span>
                  </span>
                </a>

              </div>

            </div>
          </div>

          <div class="block-top-panel hidden-sm">

          </div>

        </div>

      </div>
    </div>

    <div class="container header-wrapper">
      <header class="header">
        <div class="header-inner row flex-between flex-center-sm flex-middle ">
          <div class="left-blocks cell-">
            <div class="left-blocks-inner row flex-middle">

              <div class="header-block js-contacts-header cell-4 hidden-sm ">

                <div class="email text-left hidden-sm">

                </div>
                <div class="phone text-left text-center-sm hidden-sm">

                  <a href="tel:+7(967)307-01-00" class="contact-link tel"> +7(967)307-01-00</a>
                  {{-- <br> <a class="backcall-toggle js-backcall-toggle">Обратный звонок</a> --}}

                </div>


              </div>

              <div class="logotype-wrapper cell-4 cell-7-md cell-12-sm text-center">
                <div class="logotype text-center-sm cell-5" style="margin: 0 auto">

                  <a title="R-store" href="/" class="logotype-link">

                      <img src="{{url('/images/logo_rstore.png')}}"
                      class="logotype-image" alt="R-store logo" title="R-store">

                  </a>
                </div>
              </div>

              <div class="header-info header-block hidden-sm cell-4 cell-7-md cell-12-sm">
                <div class="header-block header-compare" style="justify-content: flex-end">



                  <div class="shopcart-widget-wrapper  hidden-sm">
                    <div class="shopcart-widget in-header">
                      <a href="{{ route('cart') }}" title="Корзина" class="shopcart-widget-link ">
                        <span class="shopcart-widget-icon">
                          <span class="shopcart-widget-count js-shopcart-widget-count">{{ $cart_count }}</span>
                        </span>
                        <span class="shopcart-widget-data">
                          <span class="shopcart-widget-caption">
                            Корзина:
                          </span>

                          <span class="shopcart-widget-amount js-shopcart-widget-amount hidden-sm">{{  $cart_price  }}&nbsp;руб</span>
                        </span>
                      </a>

                      <div class="cart-widget-dropdown hidden hidden-sm empty-cart">
                        <form action="" method="post" class="shopping-cart js-cart-widget-empty hidden">
                          <div class="cart-body">
                            <div class="cart-list js-cart-dropdown">

                            </div>
                          </div>

                          <div class="cart-footer row flex-between ">

                            <div class=" cart-block-checkout is-cart-dropdown">
                              <div class="cart-total js-shopcart-total-summ">0.00&nbsp;руб</div>

                              <a class="cart-checkout button is-primary is-cart-dropdown" href="/cart_items">
                                <span class="button-text">
                                  Оформить
                                </span>
                              </a>
                            </div>

                          </div>
                          <input type="hidden" name="_method" value="put">
                          <input type="hidden" name="make_order" value="">
                          <input type="hidden" name="lang" value="ru">

                        </form>


                        <div class="notice notice-info text-center js-cart-empty">
                          Ваша корзина пуста
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


        </div>

        <div class="main-menu-wrapper hidden-sm">
          <ul class="main-menu menu level-1 insales-menu--loaded" data-menu-id="main-menu">

            <li class="main-menu-item menu-item level-1">
              <div class="main-menu-item-controls menu-item-controls level-1">


                <a href="https://www.service-ai.ru" class="main-menu-link menu-link level-1"
                  data-menu-link-source="menu" data-menu-link-current="no">
                  Ремонт
                </a>
              </div>
            </li>

            <li class="main-menu-item menu-item level-1">
              <div class="main-menu-item-controls menu-item-controls level-1">


                <a href="/page/delivery" class="main-menu-link menu-link level-1" data-menu-link-source="menu"
                  data-menu-link-current="no">
                  Доставка
                </a>
              </div>
            </li>
            <li class="main-menu-item menu-item level-1">
              <div class="main-menu-item-controls menu-item-controls level-1">


                <a href="/page/rassrochka" class="main-menu-link menu-link level-1" data-menu-link-source="menu"
                  data-menu-link-current="no">
                  Кредит
                </a>
              </div>
            </li>
            <li class="main-menu-item menu-item level-1">
              <div class="main-menu-item-controls menu-item-controls level-1">


                <a href="/page/oplata" class="main-menu-link menu-link level-1" data-menu-link-source="menu"
                  data-menu-link-current="no">
                  Оплата
                </a>
              </div>
            </li>
            <li class="main-menu-item menu-item level-1">
              <div class="main-menu-item-controls menu-item-controls level-1">


                <a href="/page/kontakty" class="main-menu-link menu-link level-1" data-menu-link-source="menu"
                  data-menu-link-current="no">
                  Контакты
                </a>
              </div>
            </li>

          </ul>


          <form class="search-widget in-header " action="/search" method="get">
            <input type="text" name="q" class="search-widget-field" value="" placeholder="Поиск">


            <button type="submit" class="search-widget-button button is-widget-submit">

            </button>



          </form>



        </div>
      </header>

    </div>

    <div class="content-wrapper container fhg-content">


      @includeWhen(isset($cats), 'sidebar')

      <div class="row collection-wrapper">
        <div class="collection cell-12 cell-12-md cell-12-sm">


          @isset($bread)
            <div class="breadcrumb-wrapper">

              <ul class="breadcrumb">

                <li class="breadcrumb-item home">
                  <a class="breadcrumb-link home-icon" title="Главная" href="/">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA80lEQVR4nM3UP0sDQRQE8F9SWKigASGNiJxFhBDBJvgBrDRW11lYamlhYSGxTaOVlVgE0iiK31EWHnLEP2wuAR0Ydt883tweyw552ArOjVWM8BAchVYLJ3jHQUXbxxvO0Mg12sUzLtH8pt8Iw1fs/Wa0jjvcYy3jwyu4xRM2ppvHeEHX7OjG7FFVnJgfk2oxXoDh+KeixGMmyxzDhZ+wj/NM9nMMCxxmsviTXy7/7aV0sIQeNtGKfSvqXvQ78TqaoRWRQF8ML9DGEINIlmGsg9i343avsBzaKXamDVMo3OC6JtNs8vhEiqTtOH4dptnsfJwJH3cFP7BDKMvAAAAAAElFTkSuQmCC">
                  </a>
                </li>
                <li class="breadcrumb-item">
                  <span class="breadcrumb-page">{{ $bread }}</span>
                </li>

              </ul>

            </div>
{{--
            <div class="page-headding-wrapper">
              <h1 class="page-headding">


                 {{ $bread }}



              </h1>
            </div><!-- /.page_headding --> --}}


            <div class="collection-mix-description">


              <div class="collection-description at-top editor">
                <p><span style="font-family: helvetica; font-size: 14pt;">Выберите модель:</span></p>
              </div>

            </div>


          <div class="toolbar collection-toolbar at-top" style="display: none">
            <div class="toolbar-inner is-between">

              <div class="filter-collapse ">
                <button type="button" class="filter-panel-open-sidebar button is-primary js-open-filter"
                  data-filter-caption="Фильтры">
                  <span class="filter-collapse__label">
                    Фильтры</span>
                </button>

              </div>

              <div class="collection-order-wrapper flex-end">
                <form class="collection-order " action="/collection/iphone" method="get">

                  <label class="collection-order-row is-order  ">
                    <span class="collection-order-label order-sort">
                      Сортировка:
                    </span>

                    <select class="collection-order-field" name="order">
                      <option value="">Сортировка</option>
                      <option value="price">по возрастанию цены</option>
                      <option value="descending_price">по убыванию цены</option>

                    </select>

                  </label>
                </form>

              </div>

            </div>
          </div>
          @endisset

          @yield('content')

          <div class="toolbar collection-toolbar at-bottom">
            <div class="toolbar-inner">
              <div class="collection-order-wrapper hide-sm">



              </div>

            </div>
          </div>


          {{-- <div class="collection-description is-seo editor">
            <p><span style="font-family: helvetica; color: #999999;">Купить оригинальный iPhone в рассрочку | айфон | в
                Новороссийске по низкой цене.</span></p>
          </div> --}}



          <!-- <div class="view-products js-view-products">
  </div> -->


        </div>




      </div>
    </div>

    <div class="footer-wrapper">
      <div class="container">


        <footer class="footer ">










          <div class="footer-menu-wrapper is-vertical cell-12 cell-12-sm text-center">
            <ul class="footer-menu menu level-1 insales-menu--loaded" data-menu-id="footer-menu">




              <li class="footer-menu-item menu-item level-1">
                <div class="footer-menu-item-controls menu-item-controls level-1">


                  <a href="/page/delivery" class="footer-menu-link menu-link level-1" data-menu-link-source="menu"
                    data-menu-link-current="no">
                    Доставка
                  </a>
                </div>
              </li>





              <li class="footer-menu-item menu-item level-1">
                <div class="footer-menu-item-controls menu-item-controls level-1">


                  <a href="/page/rassrochka" class="footer-menu-link menu-link level-1" data-menu-link-source="menu"
                    data-menu-link-current="no">
                    Кредит
                  </a>
                </div>
              </li>





              <li class="footer-menu-item menu-item level-1">
                <div class="footer-menu-item-controls menu-item-controls level-1">


                  <a href="/page/oplata" class="footer-menu-link menu-link level-1" data-menu-link-source="menu"
                    data-menu-link-current="no">
                    Оплата
                  </a>
                </div>
              </li>





              <li class="footer-menu-item menu-item level-1">
                <div class="footer-menu-item-controls menu-item-controls level-1">


                  <a href="/page/kontakty" class="footer-menu-link menu-link level-1" data-menu-link-source="menu"
                    data-menu-link-current="no">
                    Контакты
                  </a>
                </div>
              </li>


            </ul>
          </div>



          <div class="footer-bottom-wrapper row">
            <div class="footer-block js-contacts-header  cell-4 cell-12-sm   ">
              <div class="phone text-left text-center-sm">

                <a href="tel:+7(988)13-222-02" class="contact-link tel"> +7(988)13-222-02</a>

              </div>

              <div class="email text-left text-center-sm ">

              </div>
            </div>

            <div class="social-link-wrapper cell-4 cell-12-sm cell-12-xs flex-first-sm ">



              <ul class="social-menu">




                <li class="social-menu-item">
                  <a target="blank" title="Vkontakte" href="http://vk.com/r-store" class="social-menu-link">
                    <div class="fa fa-vk fa-lg"></div>
                  </a>
                </li>



                <li class="social-menu-item">
                  <a target="blank" title="Instagram" href="https://www.instagram.com/r-store/"
                    class="social-menu-link">
                    <div class="fa fa-instagram fa-lg"></div>
                  </a>
                </li>


              </ul>
            </div>


            <div class="insales-copyright cell-4  cell-10-xs cell-10-sm text-right ">
              <a href="https://www.rusprofile.ru/ip/323237500108825" class="insales-copyright-link" target="_blank">

              </a>
            </div>
          </div>
          <button class="js-arrow-up">
          </button>

        </footer>

      </div>
    </div>
  </div>


  @if (Session::has('success'))
  <script>
       $(function(){
         setTimeout(()=>{
           $('.ajs-success').slideUp()
         }, 2000)
       })
  </script>
@endif

<script>
  $('.button_mobile_menu').click(function(){
      $('.mobile_menu').toggle()
    })

    $('.ajs-modal').click(function(){
        $('.mobile_menu').hide()
    })
</script>

@stack('scripts')
</body>

</html>
