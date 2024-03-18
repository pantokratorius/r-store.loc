<?php

namespace App\Http\Controllers;

use App\Mail\OrderSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __invoke(Request $request)
    {


        $mail['date'] = date('d.m.Y H:i:s');
        $mail['name'] = $request->input('client.name');
        $mail['phone'] = $request->input('client.phone');
        $mail['type'] = $request->input('order.payment_gateway_id');
        $mail['delivery'] = $request->input('order_delivery_variant_id');
        DB::table('orders')->insert([
            'data' =>  base64_encode( serialize($mail)),
        ]);
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
        $message = implode(PHP_EOL, $mail);
        // dd($mail);
        $recepient = 'erik.krasnauskas@yandex.ru';

        $res = Mail::to($recepient)->send(new OrderSend($message));
        return $res;
    }



}
