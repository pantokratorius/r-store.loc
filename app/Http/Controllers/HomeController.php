<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Support\Str;
use App\Services\DataService;
use Illuminate\Http\Request;

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

        if(!isset($transfer[$category]))
            abort(404);

        $dat = $transfer[$category];
        foreach ($transfer as $k => $v) {
            $name = trim(EmojiRemover::filter($v['real_name']));
            $cats[$k] = $name;
        }
        // dump($cats);
        $image_keys = [] ;
        foreach($dat as $k=>$v){
            if(is_array($v)){
                $image_keys[] = EmojiRemover::filter($k);
                foreach($v as $kk => $vv){
                    $ims[$k] = EmojiRemover::filter($k);
                }
            }
        }
        // dd($image_keys);
        $images = DB::table('images')->whereIn('ref_id', $image_keys)->pluck('image_link', 'ref_id');

        $bread =  $cats[$category];

        $res = $dat;
        $dat['real_category_name'] = EmojiRemover::filter( trim( str_replace(['/'], ['-'], $dat['real_name'])));
        $dat['real_name'] = EmojiRemover::filter(str_replace(['/', ' '], ['-', ''], $dat['real_name']));

        $res = $dat; //dd($dat);
        $active = $category;

        $cats = array_reverse($cats);
        return view('frontend.category', compact('res', 'cats', 'bread', 'active', 'images', 'ims'));
    }

    public function item($category, $item, DataService $dataService)
    {
        $category = Str::replace('-', '/', $category);
        $item = Str::replace('-', '', $item);
        

        $data =  $dataService->getAllData();
        
        foreach($data as $k => $v){
            foreach($v as $kk => $vv){
                if(is_array($vv))
                    $temp_data[ str_replace([' ', '-', '/'], '', $vv['real_item_name'] ) ]= $vv;
                
            }
        }
    // dd($temp_data,$item);
        
        
        if(!isset($temp_data[$item]))
        abort(404);

    

        $result = $temp_data[$item];

        $res = $result;

        $search_image_item = EmojiRemover::filter($item);
        $search_image_item = str_replace(['Iphone', 'Watch'], '',$search_image_item);

        $image_n_specs = DB::table('images')->where('ref_id', $search_image_item)->select('image_link', 'specs')->first();


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

    public function search($query, DataService $dataService, Request $request){
        if($request->ajax()){
            $transfer = $dataService->getAllData();

            // dd($transfer);
            $c = 0; $dat = [];
            foreach($transfer as $k=>$v){
                    if(is_array($v)){
                        foreach($v as $key=>$val){
                            if(is_array($val)) {
                            if( stripos(trim( str_replace(' ', '', $val['real_item_name'] ) ), trim( str_replace(' ', '', $query) )) !== false ){
                                $dat[$c] = $val;
                                $dat[$c]['real_category_name'] = EmojiRemover::filter( trim( str_replace(['/', ' '], ['-', ''], $v['real_name'])));
                                $dat[$c]['real_name'] = EmojiRemover::filter(str_replace(['/', ' '], ['-', ''], $val['real_name']));;
                                $c++;
                            }
                        }
                        }
                    }
                }

                // dd($dat);

                foreach ($transfer as $k => $v) {
                    $name = EmojiRemover::filter($v['real_name']);
                    $cats[$k] = $name;
                }

            $image_keys = [] ;
            foreach($dat as $k=>$v){
                    $image_keys[] = $v['real_name'];
            }

            $images = DB::table('images')->whereIn('ref_id', $image_keys)->pluck('image_link', 'ref_id');

            // dd($image_keys);

            // foreach($dat as $k => $v){
                //     $dat[$k]['real_category_name'] = EmojiRemover::filter( trim( str_replace(['/'], ['-'], $k)));
                //     $dat[$k]['real_name'] = EmojiRemover::filter(str_replace(['/', ' '], ['-', ''], $k));
                // }
                // dd($dat);
                $res = $dat; //dd($dat);

                $cats = array_reverse($cats);





                $view=view('frontend.search', compact('res', 'cats',  'images'));
                $view=$view->render();
                echo $view;
            }
        }


        public function searchitem($query, DataService $dataService){
            $transfer = $dataService->getAllData();

        // dd($transfer);
        $c = 0; $dat = [];
        foreach($transfer as $k=>$v){
            if(is_array($v)){
                foreach($v as $key=>$val){
                    if(is_array($val) && stripos($val['real_item_name'], $query) !== false ){
                        $dat[$c] = $val;
                        $dat[$c]['real_category_name'] = EmojiRemover::filter( trim( str_replace(['/', ' '], ['-', ''], $v['real_name'])));
                        $dat[$c]['real_name'] = EmojiRemover::filter(str_replace(['/', ' '], ['-', ''], $val['real_name']));;
                        $c++;
                    }

                }
            }
        }

        // dd($dat);

        foreach ($transfer as $k => $v) {
            $name = EmojiRemover::filter($v['real_name']);
            $cats[$k] = $name;
        }

        $image_keys = [] ;
        foreach($dat as $k=>$v){
                $image_keys[] = $v['real_name'];
        }

        $images = DB::table('images')->whereIn('ref_id', $image_keys)->pluck('image_link', 'ref_id');

        $res = $dat; //dd($dat);

        $cats = array_reverse($cats);

        $view=view('frontend.searchitem', compact('res', 'cats',  'images'));
        $view=$view->render();
        echo $view;
    }


}
