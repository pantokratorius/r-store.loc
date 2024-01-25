@extends('layout')

@section('content')
<div class="products-list is-collection row">


 @foreach($res as $key=>$val)
    @if($key != 'nacenka' && $key != 'real_name')

            <div class="product-card-wrapper in-collection cell-3 cell-4-md cell-6-xs cell-6-mc">

              <div class="product-card ">
                <div class="product-card-inner">

                    <a href="{{route('item', [$res['real_name'],  str_replace('/', '', preg_replace('!\s++!u', '-', trim($val['real_name']))) ] )}}"
                    class="product-card-photo image-container is-square is-cover" title="iPhone 15 Pro Max, 256 ГБ,
                    Титановый">

                    <img
                      src="@if(isset($images[$key]))  {{ asset('images/products/'. $images[$key]) }} @else https://static.insales-cdn.com/images/products/1/7352/757046456/iPhone15ProMax_Star_Small.jpg @endif"
                      title="" alt="iPhone 15 Pro Max, 256 ГБ, Титановый" class="product-card-image">
                  </a>

                  <div class="product-card-form_block">
                    <div class="product-card-price product-prices in-card">
                      <div class="price in-card">


                        {{ $val['price'] }}&nbsp;руб


                      </div>
                    </div>

                    <form class="product-cart-control without-old-price without-sku is-available" method="post"
                      action="" data-product-id="399427784">

                      <input type="hidden" name="variant_id" value="663625981">
                      <input type="hidden" name="quantity" class="counter-input input-number input-field" value="1">

                      <!-- Если больше 1 модификации -->

                      <div class="buy text-right-xl more-info">
                        <a href="{{route('addcart', [$res['real_name'],   str_replace('/', '', preg_replace('!\s++!u', '-', trim($val['real_name']))) ])}}" class="button button-buy is-primary" type="submit" data-item-add="">
                        </a>
                      </div><!-- /.buy -->

                      <!-- product.quantity == 0 -->


                    </form><!-- /.product-control -->
                  </div>

                  <a href="{{route('item', [$res['real_name'],  str_replace('/', '', preg_replace('!\s++!u', '-', trim($val['real_name']))) ])}}" class="product-link">
                       {{$val['real_item_name']}}
                  </a>


                </div>
              </div>







            </div>

 @endif

@endforeach

          </div>
@endsection

@push('scripts')
<script>

    $('.button-buy').click(function(e){
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
              $('body').prepend(`<div class="ajs-message ajs-success ajs-visible" style="display: none">${data[2]}</div>`) 
            $('.ajs-success').slideDown().delay(2000).slideUp()
            
        });
        return false
    })

</script>
@endpush
