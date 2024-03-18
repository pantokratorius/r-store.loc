<!DOCTYPE html>
<html>
<head>
    <title>Новый заказ!</title>
</head>
<body>
    <h1>Заказ с сайта R-Store</h1>
    @foreach($data as $val)
        @if(!is_array($val))
            <p>{{ $val }}</p>
        @else

            @foreach ($val as $v)
            <div class="co-basket_item-image_container">
                <div class="co-basket_item-image">
                   <img style="max-width: 150px" @if(isset($v['image']) )
                      src="{{ asset('images/products/' . $v['image']) }}" alt="{{$v['real_item_name']}}" title="{{$v['real_item_name']}}"
                      @else
                      src="{{url('/images/noimage.png')}}" alt="Apple product" title="" style="max-width: 100px; object-fit: contain"
                  @endif />
                </div>
              </div>
              <div class="co-basket_item-description">{{ $v['real_item_name'] }}</div>
              <div class="co-basket_item-total">
                <span class="co-basket_item-count">{{ $v['quantity'] }}</span> x <span class="co-basket_item-price co-price--current">{{ $v['price'] }}&nbsp;руб</span>
              </div>
            </div>
            @endforeach

        @endif
    @endforeach


</body>
</html>
