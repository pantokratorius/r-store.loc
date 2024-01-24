<?php

namespace App\View\Composers;

use App\Services\DataService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class CartDataComposer
{
    public function compose(View $view)
    {
        $dataService = new DataService;

        $cart =  $dataService->getCartData();
// dd($cart);
        $view->with('cart_count', $cart);
    }
}












?>
