<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Support\Str;




class HomeController extends Controller
{
    public function __invoke()
    {
        $data =  $this->getAllData();
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
            $cats[EmojiRemover::filter($k)] = EmojiRemover::filter($v['real_name']);

        $bread = end($cats);

        foreach($data as $k=>$v){
            foreach($v as $key=>$val){
                $k = EmojiRemover::filter($k);
                $res[$k][$key] = $val;
                if(is_array($res[$k][$key])){
                    $res[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
            }
        }

        $cart = session()->get('cart', []);
// dd($res);

        return view('home', compact('res', 'cats', 'bread'));
    }


    public function category($category){
        $category = Str::replace('-', '/', $category);

        $data =  $this->getAllData();
         foreach($data as $k=>$v){
            foreach($v as $key=>$val){
                $k = EmojiRemover::filter($k);
                $res[$k][$key] = $val;
                if(is_array($res[$k][$key])){
                    $res[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
            }
        }

        $dat = $res[$category];

        foreach($data as $k => $v)
            $cats[EmojiRemover::filter($k)] = EmojiRemover::filter($v['real_name']);
        $bread =  $cats[$category];

        $res = $dat;
        $dat['real_name'] = EmojiRemover::filter( Str::replace(['/', ' '], ['-', ''], $dat['real_name']));

        $res = $dat; //dd($res);
        $active = $category;

        return view('category', compact('res', 'cats', 'bread', 'active'));
    }

    public function item($category, $item){

        $category = Str::replace('-', '/', $category);
        $item = Str::replace('-', '', $item);

        $data =  $this->getAllData();
        foreach($data as $k=>$v){
            foreach($v as $key=>$val){
                $k = EmojiRemover::filter($k);
                $res[$k][$key] = $val;
                if(is_array($res[$k][$key])){
                    $res[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
            }
        }

        $group = $res[$category];

        foreach($group as $k=>$v){
            if(is_array($v))
            $mass[EmojiRemover::filter($k)] = $v;
    }


    $result = $mass[$item];
    $result['price'] = Str::replace('.',' ', $result['price']);

$res = $result;

        foreach($data as $k => $v)
            $cats[EmojiRemover::filter($k)] = EmojiRemover::filter($v['real_name']);
        $bread =  $cats[$category];

        $active = $category;


        return view('item', compact('res', 'cats', 'bread', 'active'));
    }


    public function getAllData(){
        $data =  DB::table('data')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);

        return $data;
    }


    // public function selectItem($category_id, $item_id) {
    //     $data =  $this->getAllData();
    //     $keys = array_keys($data);

    //     $group = $data[$keys[$category_id - 1]];

    //     foreach($group as $k=>$v){
    //         if(is_array($v))
    //             $mass[] = $v;
    //     }


    //     $res = $mass[$item_id - 1];

    //     $res['real_name'] = EmojiRemover::filter( $res['real_name'] );
    //     $res['price'] = Str::replace('.',' ', $res['price']);

    //     return $res;
    // }




}
