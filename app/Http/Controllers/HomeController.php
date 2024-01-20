<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Support\Str;
use App\Services\DataService;




class HomeController extends Controller
{
    public function __invoke(DataService $dataService)
    {
        //session()->flush();
    //    dd( session()->get('cart') );
        $transfer = $dataService->getAllData();
// foreach($transfer as $k=>$v) dump($v);
        // dd($transfer);
        foreach ($transfer as $k => $v) {
            $name = EmojiRemover::filter($v['real_name']);
            $cats[$k] = $name;
        }
        // dd($cats);
        $res = $transfer;
        $bread = end($cats);


        $cart = session()->get('cart', []);
        //    dd($cart);
        return view('home', compact('res', 'cats', 'bread'));
    }


    public function category($category, DataService $dataService)
    {

        $category = Str::replace('-', '/', $category);

        $transfer = $dataService->getAllData();


        $dat = $transfer[$category];

        foreach ($transfer as $k => $v) {
            $name = EmojiRemover::filter($v['real_name']);
            $cats[$k] = $name;
        }

        $bread =  $cats[$category];

        $res = $dat;
        $dat['real_name'] = EmojiRemover::filter(Str::replace(['/', ' '], ['-', ''], $dat['real_name']));

        $res = $dat; //dd($res);
        $active = $category;


        return view('category', compact('res', 'cats', 'bread', 'active'));
    }

    public function item($category, $item, DataService $dataService)
    {

        $category = Str::replace('-', '/', $category);
        $item = Str::replace('-', '', $item);

        $data =  $dataService->getAllData();


        $group = $data[$category];

        foreach ($group as $k => $v) {
            if (is_array($v))
                $mass[EmojiRemover::filter($k)] = $v;
        }


        $result = $mass[$item];

        $res = $result;
        $res['image'] = $item;
// dd($res);
        foreach ($data as $k => $v)
            $cats[EmojiRemover::filter($k)] = EmojiRemover::filter($v['real_name']);
        $bread =  $cats[$category];

        $active = $category;



        return view('item', compact('res', 'cats', 'bread', 'active'));
    }
}
