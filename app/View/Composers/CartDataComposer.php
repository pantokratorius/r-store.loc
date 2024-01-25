<?php

namespace App\View\Composers;

use App\Services\DataService;
use Illuminate\View\View;


class CartDataComposer
{
    public function compose(View $view)
    {
        $data = new DataService;

        $arr = $data->getCartPrice();
// dd($arr);
        $view->with('cart_count', $arr[1])
        ->with('cart_price', $arr[0]);
     }
}












?>
