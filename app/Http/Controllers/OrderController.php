<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(DataService $dataService){

        $cart = $dataService->getCartData();
        // dd(compact('cart_price'));
        if(count($cart) < 1 )
            return view('frontend.cart', compact('cart') );
        return view('frontend.order', compact('cart') );
    }



}
    ?>