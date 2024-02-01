<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __invoke()
    {
        return view('frontend.construction');
    }
}
