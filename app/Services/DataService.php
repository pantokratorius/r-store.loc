<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;



class DataService {

    public function getAllData(){

        $data =  DB::table('data')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);
        $nacenka = DB::table('nacenka')->pluck('data'); 
        if(!empty($nacenka[0])) $nacenka = json_decode ($nacenka[0], 1);
        foreach($data as $k=>$v){
        $k = EmojiRemover::filter($k);
        $new_data[$k] = $v;
        }
        foreach($nacenka as $k=>$v){
        $k = EmojiRemover::filter($k);
        $new_nacenka[$k] = $v;
        }

        foreach($new_data as $k=>$v){ 
        $k = EmojiRemover::filter($k);
        if( !empty($new_nacenka[$k]) ){
            $nacenk = $new_nacenka[$k]; 
            foreach ($new_data[$k] as $key => $val) { 
                $key = EmojiRemover::filter($key); 
                if($key != 'real_name'){
                    $transfer[$k][$key]['price'] = isset($new_nacenka[$key]) ? self::formatNumber($new_nacenka[$key]) : self::formatNumber(  (int)str_replace('.','',$val['price'])  + $nacenk );
                    $transfer[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
                else $transfer[$k][$key] = EmojiRemover::filter( $val);
            }
        }else{
                foreach ($new_data[$k] as $key => $val) {
                $key = EmojiRemover::filter($key);
                    if($key != 'real_name'){
                    $transfer[$k][$key]['price'] =  isset($new_nacenka[$key]) ? self::formatNumber($new_nacenka[$key]) : self::formatNumber( (int)str_replace('.','',$val['price'] ) );    //save([$res[$k],  $val ]);
                    $transfer[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                    }
                else $transfer[$k][$key] = EmojiRemover::filter( $val);

            }
        }
        } 

        return $transfer;
    }


    public function getCartData(){
        $temp = session()->get('cart');
        $cart = [];
        if(!empty($temp))
            foreach($temp as $k=>$v){

                $cart[$k]['totalprice'] = $this->formatNumber( $v['price'] * $v['quantity'] ); 
                foreach($v as $key=>$val){
                    if($key == 'price')
                        $cart[$k]['price'] = $this->formatNumber( $val );
                    elseif($key == 'name' && stripos($k, 'iphone') !==false )
                        $cart[$k][$key] = 'Iphone '. $val; 
                    else {
                        $cart[$k][$key] =  $val; 
                    }
                }
            }
        return $cart;
    }
  

    public static function formatNumber($number){
        return  number_format( str_replace([' ', '.', ','], '', $number), 0, '.', ' ' );
    }


}



?>