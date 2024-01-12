@extends('layout')

@section('content')
<div class="products-list is-collection row">
 @php
    $index = 1;
 @endphp

 @foreach($res as $key=>$val)
    @if($key != 'nacenka' && $key != 'real_name')

            <div class="product-card-wrapper in-collection cell-3 cell-4-md cell-6-xs cell-6-mc">

              <div class="product-card ">
                <div class="product-card-inner">

                    <a href="{{route('item',  [$active + 1,  $index])}}"
                    class="product-card-photo image-container is-square is-cover" title="iPhone 15 Pro Max, 256 ГБ,
                    Титановый">

                    <img
                      src="https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg"
                      title="" alt="iPhone 15 Pro Max, 256 ГБ, Титановый" class="product-card-image">
                  </a>

                  <div class="product-card-form_block">
                    <div class="product-card-price product-prices in-card">
                      <div class="price in-card">


                        {{$val['price']}}&nbsp;рубve


                      </div>
                    </div>

                    <form class="product-cart-control without-old-price without-sku is-available" method="post"
                      action="/cart_items" data-product-id="399427784">

                      <input type="hidden" name="variant_id" value="663625981">
                      <input type="hidden" name="quantity" class="counter-input input-number input-field" value="1">

                      <!-- Если больше 1 модификации -->

                      <div class="buy text-right-xl more-info">
                        <button class="button button-buy is-primary" type="submit" data-item-add="">
                        </button>
                      </div><!-- /.buy -->

                      <!-- product.quantity == 0 -->


                    </form><!-- /.product-control -->
                  </div>

                  <a href="/product/iphone-15-pro-max-256-gb-titanovyy-1-sim-esim" class="product-link">
                       {{$val['real_name']}} 
                  </a>


                </div>
              </div>







            </div>
            @php
            $index++; 
        @endphp
            
 @endif             

@endforeach

          </div>
@endsection