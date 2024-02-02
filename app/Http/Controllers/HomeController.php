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
        $cats = array_reverse($cats);
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

        // dd($dat);
        $image_keys = [] ;
        foreach($dat as $k=>$v){
            if(is_array($v))
                $image_keys[] = $k;
        }
        $images = DB::table('images')->whereIn('ref_id', $image_keys)->pluck('image_link', 'ref_id');

        $bread =  $cats[$category];

        $res = $dat;
        $dat['real_category_name'] = EmojiRemover::filter( trim( str_replace(['/'], ['-'], $dat['real_name'])));
        $dat['real_name'] = EmojiRemover::filter(str_replace(['/', ' '], ['-', ''], $dat['real_name']));

        $res = $dat; //dd($dat);
        $active = $category;

        $cats = array_reverse($cats);
        return view('frontend.category', compact('res', 'cats', 'bread', 'active', 'images'));
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
        
        $image_n_specs = DB::table('images')->where('ref_id', $item)->select('image_link', 'specs')->first();
        if($image_n_specs){
            if($image_n_specs->image_link)
                $res['image'] = $image_n_specs->image_link;
            if($image_n_specs->specs){
                $specs = $image_n_specs->specs;
            }else{
                $specs = DB::table('specs')->where('category', $category)->select('specs')->first();
                if($specs) $specs = $specs->specs;
            }
                if($specs){
                    $temp = preg_split('/\r\n|\r|\n/', $specs);
                    if(is_array($temp) && count($temp) > 1){
                        $res['specs'] = '<ul><li>';
                        $res['specs'] .= implode('</li><li>', $temp);
                        $res['specs'] .= '</li></ul>';
                    }else{
                        $res['specs'] = $specs;
                    }
                } 
        }
        
// dD($temp);
        foreach ($data as $k => $v)
            $cats[EmojiRemover::filter($k)] = EmojiRemover::filter($v['real_name']);
        $bread =  $cats[$category];

        $active = $category;


        $cats = array_reverse($cats);
        return view('frontend.item', compact('res', 'cats', 'bread', 'active'));
    }
}
