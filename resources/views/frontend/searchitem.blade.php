@extends('frontend.layout')





@section('content')


@if(!empty($res))
<div class="products-list is-collection row">


 @foreach($res as $key=>$val)
    @if(is_array($val))

            <div class="product-card-wrapper in-collection cell-3 cell-4-md cell-6-xs cell-6-mc">

              <div class="product-card ">
                <div class="product-card-inner">

                    <a href="{{route('item', [$val['real_category_name'],  str_replace('/', '', preg_replace('!\s++!u', '-', trim($val['real_name']))) ] )}}"
                    class="product-card-photo image-container is-square is-cover">


                    <img @if(isset($images[$val['real_name']]))
                        src="{{ asset('images/products/'. $images[$val['real_name']]) }}" title="{{trim($val['real_name'])}}" alt="{{trim($val['real_name'])}}"
                      @else
                        style="max-width: 100px; object-fit: contain" src="{{url('/images/noimage.png')}}" title="" alt="Apple products"
                        class="product-card-image">
                     @endif
                     />
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
                        <a href="{{route('addcart', [$val['real_category_name'],   str_replace('/', '', preg_replace('!\s++!u', '-', trim($val['real_item_name']))) ])}}" class="button button-buy is-primary" type="submit" data-item-add="">
                        </a>
                      </div><!-- /.buy -->

                      <!-- product.quantity == 0 -->


                    </form><!-- /.product-control -->
                  </div>

                  <a href="{{route('item', [$val['real_category_name'],  str_replace('/', '', preg_replace('!\s++!u', '-', trim($val['real_item_name']))) ])}}" class="product-link">
                       {{$val['real_item_name']}}
                  </a>


                </div>
              </div>







            </div>

 @endif

@endforeach
<button class="glow-on-hover" type="button">&uarr;</button>
          </div>

  @else

  <div class="products-list is-collection row">
    <h3>Ничего не найдено...</h3>
  </div>



  @endif

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
              $('body').prepend(`<div class="ajs-message ajs-success ajs-visible" style="display: none">${data[3]}</div>`)
            $('.ajs-success').slideDown().delay(2000).slideUp()

        });
        return false
    })

</script>
@endpush
