@extends('layout')

@section('content')
<div class="products-list is-collection row">


@foreach($res as $k=>$v)
 @foreach($v as $key=>$val)
    @if($key != 'nacenka' && $key != 'real_name')

            <div class="product-card-wrapper in-collection cell-3 cell-4-md cell-6-xs cell-6-mc">

              <div class="product-card ">
                <div class="product-card-inner">

                    <a href="{{route('item', [str_replace('/', '-', $k),  str_replace(' ', '-', trim($val['real_name']))])}}"
                    class="product-card-photo image-container is-square is-cover" title="iPhone 15 Pro Max, 256 ГБ,
                    Титановый">

                    <img style="max-width: 194px"
                      src="@isset($images[$key])  {{ asset('images/products/'. $images[$key]) }} @else https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg @endisset"
                      title="" alt="iPhone 15 Pro Max, 256 ГБ, Титановый" class="product-card-image">
                  </a>

                  <div class="product-card-form_block">
                    <div class="product-card-price product-prices in-card">
                      <div class="price in-card">


                        {{$val['price']}}&nbsp;руб


                      </div>
                    </div>

                    <form class="product-cart-control without-old-price without-sku is-available" method="post"
                      action="/cart_items" data-product-id="399427784">

                      <input type="hidden" name="variant_id" value="663625981">
                      <input type="hidden" name="quantity" class="counter-input input-number input-field" value="1">

                      <!-- Если больше 1 модификации -->

                      <div class="buy text-right-xl more-info">
                        <a href="{{route('addcart', [str_replace('/', '-', $k),   str_replace(' ', '-', trim($val['real_name']))])}}"  class="button button-buy is-primary" type="submit" data-item-add=""></a>
                      </div><!-- /.buy -->

                      <!-- product.quantity == 0 -->


                    </form><!-- /.product-control -->
                  </div>

                  <a href="/product/iphone-15-pro-max-256-gb-titanovyy-1-sim-esim" class="product-link">
                       {{$val['real_item_name']}}
                  </a>


                </div>
              </div>
            </div>
 @endif

 @endforeach


 @endforeach

          </div>
@endsection
