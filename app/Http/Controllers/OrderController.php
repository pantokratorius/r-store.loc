<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(){

        return view('frontend.order' );
    }
}
