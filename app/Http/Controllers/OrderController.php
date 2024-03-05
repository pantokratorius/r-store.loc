<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(DataService $dataService){

        $cart = $dataService->getCartData();
        $cart_price = $dataService->getCartPrice();
        // dd($cart);

        return view('frontend.order', compact('cart', 'cart_price') );
    }
}
