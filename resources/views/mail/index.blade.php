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
           <table style="border: none;">
            @foreach ($val as $v)
            <tr>
                <td>
                   <img style="max-width: 150px"
                      src="{{ asset('images/products/' . $v['image']) }}" alt="{{$v['real_item_name']}}" title="{{$v['real_item_name']}}"
                      />
                </td>
              <td >{{ $v['real_item_name'] }}</td>
              <td>
                <span>{{ $v['quantity'] }}</span> x <span>{{ $v['price'] }}&nbsp;руб</span>
              </td>
        </tr>
            @endforeach
        </table>
        @endif
    @endforeach


</body>
</html>
