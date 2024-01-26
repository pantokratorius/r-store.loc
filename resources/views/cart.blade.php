@extends('layout')


@section('content')

<div class="cart-body">
  <div class="cart-list">
    <div class="content-wrapper container fhg-content">
        <div class="row cart-wrapper">
          <div class="cart cell-12">

    <div class="page-headding-wrapper">
    <h1 class="page-headding">
      Корзина
    </h1>
    </div><!-- /.page_headding -->

          </div>
        </div>
      </div>

    @forelse($cart as $k=>$v)
<div class="cart-item " data-product-id="399428219" data-item-id="663628205">
<div class="cart-item-inner item ">

<div class="item-image-wrapper ">
  <div class="item-image-inner">
    <span class="item-image-link image-container is-square is-cover">
      <img title="iPhone 15 Pro Max, 1 ТБ, Титановый синий" alt="iPhone 15 Pro Max, 1 ТБ, Титановый синий" src="https://static.insales-cdn.com/images/products/1/3682/757050978/large_iPhone15ProMax_Blue_Small.jpg" class="item-image">
    </span>
  </div>
</div>

<div class="item-content">
  <div class="item-caption">
    <p class="item-title">
        <a href="{{ route('item', [$links[$k]['cat'], $links[$k]['item'] ]) }}">
         {{ $v['real_item_name'] }}
        </a>
    </p>

  </div>

  <div class="item-prices is-total-price js-item-price hidden-xs">{{ $v['price'] }}&nbsp;руб</div>

  <div class="item-counter ">

<div class="counter js-variant-counter" data-quantity="" data-quantity-change-init="true">

  <a href="{{route('addcart', [$v['category'],   $v['item'], 'minus' ])}}" class="counter-button is-count-down">-</a>

  <input type="text" value="{{ $v['quantity'] }}" name="cart[quantity][663628205]" class="counter-input ">

  <a href="{{route('addcart', [$v['category'],   $v['item'] ])}}"  class="counter-button is-count-up ">+</a>
</div>


  </div>

  <div class="item-prices is-total-price js-item-total-price">{{ $v['totalprice']  }}&nbsp;руб</div>

  <div class="item-delete">
    <a href="{{ route('deletecart', str_replace('/', '-', $k) ) }}" type="submit" class="button is-item-delete is-transparent">

    </a>
    </div>

</div>
</div>

</div><!-- /.cart-item -->


@empty
<div class="content-wrapper container fhg-content">
    <div class="row cart-wrapper">
      <div class="cart cell-12">
<div class="notice is-info text-center js-cart-empty">
Ваша корзина пуста
</div>
      </div>
    </div>
  </div>
@endforelse

  </div>
</div>
<div class="cart-footer row flex-between">

  <div class="cell-4 cell-6-md cell-12-sm">

<div class="discount-comment-list js-discount-comment-list">

</div>

  </div>
@if(!empty($cart))
  <div class="cell-4 cell-6-md cell-12-sm flex-start-sm cart-block-checkout">
    <div class="cart-total js-shopcart-total-summ">{{$cart_price}}&nbsp;руб</div>

    <button type="submit" class="cart-checkout button is-primary" data-cart-submit="" onclick="location='{{route('order')}}'">
      <span class="button-text">
        Оформить заказ
      </span>
    </button>
  </div>
@endif
</div>
@endsection

@push('scripts')
<script>
  
$(function(){
  let tim 

  $('.counter-button').click(function(e){
    e.preventDefault()

if(typeof tim !== 'undefined') clearTimeout(tim)

  const total_price_line = $(this).closest('div.item-counter').next();
    const input = $(this).closest('div').find('.counter-input')
    let number = Number( input.val() )
    
    const href = $(this).attr('href')
    if(href.indexOf('minus') + 1){ 
      if(number <= 1)
          number = 1
        else
        number = number - 1
    } else {
        number = number + 1
    }
    input.val(number)

    tim = setTimeout(() => {
        updateQuantity(number, href, total_price_line)
    }, 500);

  })

})

  $('.counter-input ').blur(function(){
     let number = $(this).val()
     const url = $(this).closest('div').find('.is-count-down').attr('href');
     const total_price_line = $(this).closest('div.item-counter').next();
     if(number <= 1) number = 1
     updateQuantity(number, url, total_price_line)
  })



  function updateQuantity(number, url, total_price_line ){
     const href = url.split('addcart')[0] + `quantity/${number}/updatecart`
     if(number < 1) return false
     $.get( href, function( data ) {

        const elements = $('.js-shopcart-widget-count')
        elements.each(function(){
          $(this).text(data[1]) 
        })
        const price = $('.js-shopcart-widget-amount')
        price.each(function(){
          $(this).text(`${data[0]} руб`) 
        })
        total_price_line.text(`${data[3]} руб`)
        $('.js-shopcart-total-summ').text(`${data[0]} руб`)
        if(!$('.ajs-visible').length)
          $('body').prepend(`<div class="ajs-message ajs-success ajs-visible" style="display: none">${data[2]}</div>`) 
        else $('.ajs-visible').text(data[2])
        $('.ajs-success').stop(true, true).slideDown().delay(2000).slideUp()
        
    });
  }

</script>
@endpush
