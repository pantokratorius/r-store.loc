@extends('layout')

@section('content')

<div class="page-headding-wrapper">
  <h1 class="page-headding">

      {{ $res['real_item_name'] }}


  </h1>
</div>
<div class="row">

  <div class="product-gallery-wrapper cell-4 cell-6-md cell-12-sm">



<div class="product-gallery">
  <div class="gallery-main-wrapper">

    <a href="@if(isset($images[$res['image']]) ) @else https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg @endif" class="image-wrapper" id="gallery" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" data-gallery-count="1">
      <img src="@if(isset($images[$res['image']]) ) {{ asset('images/products/' . $images[$res['image']]) }} @else https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg @endif" alt="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" title="iPhone 15 Pro Max, 256 ГБ, " class="slide-image">
    </a>
  </div>
  <!-- Для тыкалок js 

    <div class="gallery-thumbs-wrapper  hidden-sm">
      <div class="gallery-thumbs swiper-container swiper-container-horizontal swiper-container-autoheight" data-slider="gallery-thumbs" style="cursor: grab;">

          <div class="product-slider-controls above-gallery" data-slider-controls="">
            {{-- <button class="product-slider-prev swiper-button-prev swiper-button-disabled is-disabled" data-slider-prev=""></button> --}}
            {{-- <button class="product-slider-next swiper-button-next" data-slider-next=""></button> --}}
          </div>



          <div class="swiper-wrapper" data-slider-container="" style="height: 59px;"><div data-slider-slide="" class="swiper-slide swiper-slide-active is-active" style="width: 57.25px; margin-right: 16px;">

            <a class="slide-inner image-container is-square js-copy-src" href="https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg" data-gallery-count="1" data-image-large="https://static.insales-cdn.com/images/products/1/7352/757046456/large_iPhone15ProMax_Star_Small.jpg" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="">
              <img class="slide-image swiper-lazy swiper-lazy-loaded" alt="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" title="iPhone 15 Pro Max, 256 ГБ, " data-slider-lazy="" src="https://static.insales-cdn.com/images/products/1/7352/757046456/medium_iPhone15ProMax_Star_Small.jpg">
            </a>
          </div><div data-slider-slide="" class="swiper-slide swiper-slide-next" style="width: 57.25px; margin-right: 16px;">

            <a class="slide-inner image-container is-square js-copy-src" href="https://static.insales-cdn.com/images/products/1/7357/757046461/iPhone15ProMax_Star1.jpg" data-gallery-count="2" data-image-large="https://static.insales-cdn.com/images/products/1/7357/757046461/large_iPhone15ProMax_Star1.jpg" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="">
              <img class="slide-image swiper-lazy swiper-lazy-loaded" alt="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" title="iPhone 15 Pro Max, 256 ГБ, " data-slider-lazy="" src="https://static.insales-cdn.com/images/products/1/7357/757046461/medium_iPhone15ProMax_Star1.jpg">
            </a>
          </div><div data-slider-slide="" class="swiper-slide" style="width: 57.25px; margin-right: 16px;">

            <a class="slide-inner image-container is-square js-copy-src" href="https://static.insales-cdn.com/images/products/1/7358/757046462/iPhone15ProMax_Star2.jpg" data-gallery-count="3" data-image-large="https://static.insales-cdn.com/images/products/1/7358/757046462/large_iPhone15ProMax_Star2.jpg" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="">
              <img class="slide-image swiper-lazy swiper-lazy-loaded" alt="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" title="iPhone 15 Pro Max, 256 ГБ, " data-slider-lazy="" src="https://static.insales-cdn.com/images/products/1/7358/757046462/medium_iPhone15ProMax_Star2.jpg">
            </a>
          </div><div data-slider-slide="" class="swiper-slide" style="width: 57.25px; margin-right: 16px;">

            <a class="slide-inner image-container is-square js-copy-src" href="https://static.insales-cdn.com/images/products/1/7362/757046466/iPhone15ProMax_Star3.jpg" data-gallery-count="4" data-image-large="https://static.insales-cdn.com/images/products/1/7362/757046466/large_iPhone15ProMax_Star3.jpg" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="">
              <img class="slide-image swiper-lazy swiper-lazy-loaded" alt="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" title="iPhone 15 Pro Max, 256 ГБ, " data-slider-lazy="" src="https://static.insales-cdn.com/images/products/1/7362/757046466/medium_iPhone15ProMax_Star3.jpg">
            </a>
          </div><div data-slider-slide="" class="swiper-slide" style="width: 57.25px; margin-right: 16px;">

            <a class="slide-inner image-container is-square js-copy-src" href="https://static.insales-cdn.com/images/products/1/7363/757046467/iPhone15ProMax_Star4.jpg" data-gallery-count="5" data-image-large="https://static.insales-cdn.com/images/products/1/7363/757046467/large_iPhone15ProMax_Star4.jpg" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="">
              <img data-src="https://static.insales-cdn.com/images/products/1/7363/757046467/medium_iPhone15ProMax_Star4.jpg" class="slide-image swiper-lazy" alt="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" title="iPhone 15 Pro Max, 256 ГБ, " data-slider-lazy="">
            </a>
          <div class="swiper-lazy-preloader"></div></div></div>









      </div>
    </div>


 Для планшетов -->

    <div class="gallery-thumbs-wrapper mobile-wrapper hidden shown-sm">
      <div class="gallery-thumbs swiper-container swiper-container-horizontal swiper-container-autoheight" data-slider="gallery-thumbs-mobile" style="cursor: grab;">

          <div class="product-slider-controls gallery-controls" data-slider-controls="">
            <button class="product-slider-prev swiper-button-prev" data-slider-prev=""></button>
            <button class="product-slider-next swiper-button-next" data-slider-next=""></button>
          </div>

          <div class="swiper-wrapper" data-slider-container="" style="transition-duration: 0ms;"><div data-slider-slide="" class="swiper-slide swiper-slide-active is-active">

            <a class="slide-inner image-container" data-fancybox="gallery" href="https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg" title="iPhone 15 Pro Max, 256 ГБ, " Титановый""="" data-caption="iPhone 15 Pro Max, 256 ГБ, " data-slide-number="1">
              <img sizes="" class="slide-image swiper-lazy swiper-lazy-loaded" data-slider-lazy="" srcset="https://static.insales-cdn.com/images/products/1/7352/757046456/large_iPhone15ProMax_Star_Small.jpg 400w, https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg 800w" src="https://static.insales-cdn.com/images/products/1/7352/757046456/large_iPhone15ProMax_Star_Small.jpg">
            </a>
          </div>
          
        </div>
      </div>
    </div>



</div>





  </div>

  <div class="cell-8 cell-6-md cell-12-sm without-old-price without-sku is-available" data-product-id="399427784" data-main-form="">
    <div class="top-panel-product">


    </div>

    <div class="product-prices on-page" style="">
        <div class="old-price js-product-old-price on-page"></div>

      <div class="price js-product-price on-page">{{ $res['price'] }}&nbsp;руб</div>
    </div>

    <div class="product-introtext on-page editor"><ul>
<li>Впервые в iPhone - титановый корпус</li>
<li>Новый чип A17 Pro</li>
<li>Ray Tracing</li>
<li>48 МП камера</li>
<li>Spatial video</li>
<li>Оптический зум 5x</li>
<li>Action Button - новая програмируемая кнопка на корпусе</li>
<li>Новый режим портретов<span class="Apple-converted-space">&nbsp;</span></li>
<li>Порт USB-C вместо Lightning</li>
<li>Заряд аккумулятора на весь день</li>
</ul></div>

    <form class="product-form" action="/cart_items">

  <div class="product-option-selectors option-selectors">

      <input type="hidden" name="variant_id" value="663625981">

  </div>

  <div class="product-control on-page" data-compare="399427784">

















    {{-- <button class="product-button button is-primary  js-variant-shown" type="submit" data-item-add="" style="display: block;"> --}}

      <a href="{{route('addcart', [str_replace('/', '-', $active ),   str_replace(' ', '-', trim($res['real_name'])) ] ) }}" class="product-button button is-primary  js-variant-shown" style="display: block;">
        В корзину
      </a>
    {{-- </button> --}}

    <div class="product-order-variant variant-hidden js-variant-hidden" style="display: none;">
      <p class="notice notice-info">
        Товар отсутствует
      </p>
    </div>

    <button class="product-button button is-primary js-variant-preorder " type="button" style="display: none;">

      <span class="button-text">
        Предзаказ
      </span>
    </button>






  </div>


</form>

  </div>
</div>
@endsection
