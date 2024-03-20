<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __invoke(DataService $dataService)
    {

        $transfer = $dataService->getAllData();
        // foreach($transfer as $k=>$v) dump($v);
                // dd($transfer);
                foreach ($transfer as $k => $v) {
                    $name = EmojiRemover::filter($v['real_name']);
                    $cats[$k] = $name;
                }
        return view('frontend.payments', compact('cats'));
    }
}
