<!DOCTYPE html>
<html>
<head>
    <title>Новый заказ!</title>
</head>
<body>
    <h1>Hello from EmailerApp!</h1>
    @foreach($data as $v)
    <p>{{ $v }}</p>
    @endforeach
</body>
</html>
