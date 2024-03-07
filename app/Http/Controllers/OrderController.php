<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(DataService $dataService){

        $cart = $dataService->getCartData();
        // dd(compact('cart_price'));

        return view('frontend.order', compact('cart') );
    }

    public function getRadioValues($param){
        echo $param;
    }



}
    ?>