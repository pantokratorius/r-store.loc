@extends('layout')


@section('content')

<div class="cart-body">
  <div class="cart-list">
    

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
      {{ $v['name'] }}
    </p>
    
  </div>

  <div class="item-prices is-total-price js-item-price hidden-xs">{{ $v['price'] }}&nbsp;руб</div>

  <div class="item-counter ">

<div class="counter js-variant-counter" data-quantity="" data-quantity-change-init="true">

<a href="{{ route('updatecart', [$k, 'down']) }}" data-quantity="{{$v['quantity']}}" class="counter-button is-count-down " onclick="if($(this).data('quantity') == 1) return false"></a>

<input type="text" value="{{ $v['quantity'] }}" name="cart[quantity][663628205]" class="counter-input ">

<a href="{{ route('updatecart', [$k, 'up']) }}" data-quantity-change="1" class="counter-button is-count-up "></a>
</div>


  </div>

  <div class="item-prices is-total-price js-item-total-price">{{ $v['totalprice']  }}&nbsp;руб</div>

  <div class="item-delete">
    <a href="{{ route('deletecart', $k ) }}" type="submit" class="button is-item-delete is-transparent">

    </a>
    </div>

</div>
</div>

</div><!-- /.cart-item -->


@empty

<div class="cart-item " >
  <div class="cart-item-inner  ">
    <div>
    <h2 style="padding: 35%; box-sizing: content-box">Корзина пуста</h2>
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

  <div class="cell-4 cell-6-md cell-12-sm flex-start-sm cart-block-checkout">
    <div class="cart-total js-shopcart-total-summ">{{$cart_price}}&nbsp;руб</div>

    <button type="submit" class="cart-checkout button is-primary" data-cart-submit="" onclick="location='{{route('order')}}'">
      <span class="button-text">
        Оформить заказ
      </span>
    </button>
  </div>

</div>
@endsection