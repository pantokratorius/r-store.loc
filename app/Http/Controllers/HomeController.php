<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Support\Str;
use App\Services\DataService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function __invoke(DataService $dataService)
    {

        // Role::create([
        //     'name' => 'Super Admin',
        //     // 'name' => 'admin',
        //     // 'name' => 'user',
        // ]);

        $user = User::get()->first();
        // $user->assignRole('Super Admin');
        dd($user);
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
        // $bread = end($cats);


        $cart = session()->get('cart', []);
        //    dd($cart);
        return view('frontend.home', compact('res', 'cats'));
    }


    public function category($category, DataService $dataService, Request $request )
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
        $dat['real_name'] = EmojiRemover::filter(str_replace(['/', ' '], ['-', ''], $dat['real_name']));

        $res = $dat; //dd($res);
        $active = $category;


        return view('frontend.category', compact('res', 'cats', 'bread', 'active'));
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



        return view('frontend.item', compact('res', 'cats', 'bread', 'active'));
    }
}
