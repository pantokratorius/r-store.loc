<!DOCTYPE html>
<html>
<head>
    <title>Заказ с сайта https://rstore-novoross.ru</title>
</head>
<body>
    <h1>Новый заказ!</h1>
    @foreach($data as $key => $val)
        @if(!is_array($val) && $key != 'total_price')
            <p>{{ $val }}</p>
        @elseif(is_array($val))
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
        <tr>
            <td style="text-align: right" colspan="2"><b>Общая сумма: </b></td>
            <td><b>{{ $data['total_price'] }}</b></td>
        </tr>
        </table>
        @endif
    @endforeach


</body>
</html>
