<?php

namespace App\View\Composers;

use App\Services\DataService;
use Illuminate\View\View;


class CartDataComposer
{
    public function compose(View $view)
    {
       $cart_count = 0;  $cart_price = 0;
       $cart = session()->get('cart', []);
       
       
       if($cart){
            foreach($cart as $k=>$v){ 
                $cart_price += $v['price'] *  $v['quantity'];
                $cart_count += $v['quantity'];
            }
            if($cart_price > 0) $cart_price = DataService::formatNumber($cart_price);
        }
        // dd($cart_price  );
        $view->with('cart', $cart)
        ->with('cart_count', $cart_count)
        ->with('cart_price', $cart_price);
    }
}












?>