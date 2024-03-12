@extends('frontend.layout')


@section('page_title')
{{$res['real_item_name']}}
@endsection


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

    <a href="@if(isset($res['image']) ) @else {{url('/images/noimage.png')}} @endif" class="image-wrapper" id="gallery">
      <img @if(isset($res['image']) )
          src="{{ asset('images/products/' . $res['image']) }}" alt="{{$res['real_item_name']}}" title="{{$res['real_item_name']}}"
          @else
          src="{{url('/images/noimage.png')}}" alt="Apple product" title="" style="max-width: 100px; object-fit: contain"
       @endif
       class="slide-image">
    </a>
  </div>


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

    <div class="product-introtext on-page editor">
      @if(isset($res['specs']))
        {!! $res['specs'] !!}
      @else
      <ul>
        <li>Информация вскоре появится</li>
      </ul>
      @endif
</div>

    <form class="product-form" action="/cart_items">



  <div class="product-control on-page" data-compare="">


    {{-- <button class="product-button button is-primary  js-variant-shown" type="submit" data-item-add="" style="display: block;"> --}}

      <a href="{{route('addcart', [str_replace('/', '-', $active ),   str_replace('/', '', preg_replace('!\s++!u', '-', trim($res['real_name']))) ] ) }}" class="product-button button is-primary  js-variant-shown cart_button" style="display: block;">
        В корзину
      </a>

      <a href="{{route('oneclick', [str_replace('/', '-', $active ),   str_replace('/', '', preg_replace('!\s++!u', '-', trim($res['real_name']))) ] ) }}" class="product-button button is-primary  js-variant-shown" style="display: block;">
        Купить в один клик
      </a>
    {{-- </button> --}}


  </div>
</form>
  </div>
</div>
@endsection

@push('scripts')
<script>

    $('.cart_button').click(function(e){
        e.preventDefault()

        $.get( $(this).attr('href'), function( data ) {
            const elements = $('.js-shopcart-widget-count')
            elements.each(function(){
              $(this).text(data[1])
            })
            const price = $('.js-shopcart-widget-amount')
            price.each(function(){
              $(this).text(`${data[0]} руб`)
            })
            if(!$('.ajs-visible').length)
              $('body').prepend(`<div class="ajs-message ajs-success ajs-visible" style="display: none">${data[3]}</div>`)
            $('.ajs-success').slideDown().delay(2000).slideUp()

        });
        return false
    })

</script>
@endpush

@push('styles')
<style>
  .product-gallery-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

@endpush
