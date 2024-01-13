<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Support\Str;




class HomeController extends Controller
{
    public function __invoke()
    {
        $data =  DB::table('data')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);
        $nacenka = DB::table('nacenka')->pluck('data'); 

        if(!empty($nacenka[0])) $nacenka = json_decode ($nacenka[0], 1);

        foreach($nacenka as $k=>$v){
            if(isset($data[$k])){
                $data[$k]['nacenka'] = $v;
            }else {
                foreach($data as $key => $val){
                    foreach ($val as $kk => $vv){
                        if($kk == $k){
                            $data[$key][$kk]['nacenka'] = $v;
                        }
                    }
                }
            }
        } 

        foreach($data as $k=>$v)
            $cats[] = EmojiRemover::filter($v['real_name']);

        $bread = end($cats);    

        foreach($data as $k=>$v){
            foreach($v as $key=>$val){
                $res[$k][$key] = $val;
                if(is_array($res[$k][$key])){
                    $res[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
            }
        }

        $cart = session()->get('cart', []);
// dd($cart);
            
        return view('home', compact('res', 'cats', 'bread'));
    }


    public function category($id){

        $id--;

        $data =  DB::table('data')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);

        $keys = array_keys($data);
        $dat = $data[$keys[$id]];
        
        foreach($data as $k => $v)
            $cats[] = EmojiRemover::filter($v['real_name']);

        $bread =  $cats[$id];    

        foreach($dat as $key=>$val){
            $res[$key] = $val;
            if(is_array($res[$key])){
                $res[$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
            }
        }

        $active = $id;

        return view('category', compact('res', 'cats', 'bread', 'active'));
    }

    public function item($category_id, $item_id){
        
        $data =  DB::table('data')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);
        $keys = array_keys($data);

        $group = $data[$keys[$category_id - 1]];

        foreach($group as $k=>$v){
            if(is_array($v))
                $mass[] = $v;
        }


        $res = $mass[$item_id - 1]; 

        $res['real_name'] = EmojiRemover::filter( $res['real_name'] );
        $res['price'] = Str::replace('.',' ', $res['price']);

        foreach($data as $k => $v)
            $cats[] = EmojiRemover::filter($v['real_name']);

        $bread =  $cats[$category_id - 1];        

        $active = $category_id - 1;


        return view('item', compact('res', 'cats', 'bread', 'active'));
    }





    public function selectItem($category_id, $item_id) {
        $data =  DB::table('data')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);
        $keys = array_keys($data);

        $group = $data[$keys[$category_id - 1]];

        foreach($group as $k=>$v){
            if(is_array($v))
                $mass[] = $v;
        }


        $res = $mass[$item_id - 1]; 

        $res['real_name'] = EmojiRemover::filter( $res['real_name'] );
        $res['price'] = Str::replace('.',' ', $res['price']);
        
        return $res;
    }

    
    

}
