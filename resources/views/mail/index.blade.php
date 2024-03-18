<!DOCTYPE html>
<html>
<head>
    <title>Заказ с сайта https://rstore-novoross.ru</title>
</head>
<body>
    <h1>Новый заказ!</h1>
    @foreach($data as $val)
        @if(!is_array($val))
            <p>{{ $val }}</p>
        @else
           <table style="margin-top: 50px">
            @foreach ($val as $v)
            <tr>
                <td>
                   <img style="max-width: 150px"
                      src="{{ asset('images/products/' . $v['image']) }}" alt="{{$v['real_item_name']}}" title="{{$v['real_item_name']}}"
                      />
                </td>
              <td ><b>{{ $v['real_item_name'] }}</b></td>
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
