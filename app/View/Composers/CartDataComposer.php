<?php

namespace App\View\Composers;

use Illuminate\View\View;


class CartDataComposer
{
    public function compose(View $view)
    {
       $cart = session()->get('cart', []);
       $cart_count = count($cart);
       
       if($cart){
        $cart_price = 0;
        foreach($cart as $k=>$v){
                $cart_price += str_replace('.','', $v['price']);
            }
        }
        $view->with('cart', $cart)
        ->with('cart_count', $cart_count)
        ->with('cart_price', $cart_price);
    }
}












?>