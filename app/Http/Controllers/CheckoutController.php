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
        if( $this->send_mail($mail) )
            session()->put('cart', []);
        return view('frontend.checkout');
        


        
    }

    public function send_mail($mail) {
        $type = [
            'cash' => 'наличными',
            'bank_card' => 'картой',
        ];
        
        $delivery = [
            'Заберу сам',
            'Доставка по Новороссийску или Новороссийскому району',
            'Доставка по России',
        ];

        $mail['date'] = 'Дата: '. $mail['date'];
        $mail['type'] = 'Оплата '. $type[ $mail['type']  ];
        $mail['delivery'] = $delivery[ $mail['delivery'] - 1 ];
        $message = implode('/n/r', $mail);
        // dd($mail);
        
        $theme = 'Новый Заказ!';
        $res =  mail("erik.krasnauskas@yandex.ru", $theme, $message, "From: =?utf-8?B?" . base64_encode("novo-trade.com") . "?=" . " <novo-trade@vip5.sweb.ru> \nContent-Type: text/html \n charset=utf-8\n");
        return $res;
    }



}
