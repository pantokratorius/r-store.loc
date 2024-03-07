<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __invoke(Request $request)
    {


        $mail['date'] = date('d.m.Y H:i:s');
        $mail['name'] = $request->input('client.name');
        $mail['phone'] = $request->input('client.phone');
        $mail['type'] = $request->input('order.payment_gateway_id');
        $mail['delivery'] = $request->input('order_delivery_variant_id');
        $this->send_mail($mail);
        dd($request->all(), $mail);


        
    }

    public function send_mail($mail) {
        $message = implode('<br>', $mail);
        $theme = 'Новый Заказ!';
        $res =  mail("erik.krasnauskas@yandex.ru", $theme, $message, "From: =?utf-8?B?" . base64_encode("yandex.ru") . "?=" . " <yandex@vip5.sweb.ru> \nContent-Type: text/html \n charset=utf-8\n");
        dd($res);
        return $res;
    }



}
