<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;



class DataService {

    public function getAllData(){

        $names_my = ['Iphone', 'Watch'];

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
                $key = str_replace('/','',$key);
                if($key != 'real_name'){
                    $transfer[$k][$key]['price'] = isset($new_nacenka[$key]) ? self::formatNumber($new_nacenka[$key]) : self::formatNumber(  (int)str_replace('.','',$val['price'])  + $nacenk );
                    foreach($names_my as $nam){
                        if(stripos($k, $nam) !==false){
                            $transfer[$k][$key]['real_item_name'] = $nam. ' ' .EmojiRemover::filter( $val['real_name']);
                            break;
                        }
                        else {
                            $transfer[$k][$key]['real_item_name'] = EmojiRemover::filter( $val['real_name']);
                        }
                    }
                    $transfer[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
                else $transfer[$k][$key] = EmojiRemover::filter( $val);
            }
        }else{
                foreach ($new_data[$k] as $key => $val) {
                $key = EmojiRemover::filter($key);
                    if($key != 'real_name'){
                        $transfer[$k][$key]['price'] =  isset($new_nacenka[$key]) ? self::formatNumber($new_nacenka[$key]) : self::formatNumber( (int)str_replace('.','',$val['price'] ) );    //save([$res[$k],  $val ]);

                        foreach($names_my as $nam){
                            if(stripos($k, $nam) !==false){
                                $transfer[$k][$key]['real_item_name'] = $nam. ' ' .EmojiRemover::filter( $val['real_name']);
                                break;
                            }
                            else {
                                $transfer[$k][$key]['real_item_name'] = EmojiRemover::filter( $val['real_name']);
                            }
                        }
                        $transfer[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                    }
                else $transfer[$k][$key] = EmojiRemover::filter( $val);

            }
        }
        }

        return $transfer;
    }


    public function getCartData(){
        $temp = session()->get('cart', []);
        $cart = []; $names_my = ['Iphone', 'Watch'];
        if(!empty($temp))
            foreach($temp as $k=>$v){

                $cart[$k]['totalprice'] = $this->formatNumber( $v['price'] * $v['quantity'] );
                foreach($v as $key=>$val){
                    if($key == 'price')
                        $cart[$k]['price'] = $this->formatNumber( $val );
                    elseif($key == 'name'  ){
                        $cart[$k][$key] =  $val;
                        foreach($names_my as $nam){ //dd($k, $nam);
                            if(stripos($k, $nam) !==false){
                                $cart[$k]['real_item_name'] = $nam. ' '. $val;
                                break;
                            }
                            else {
                                $cart[$k]['real_item_name'] =  $val;
                            }
                        }
                    } else $cart[$k][$key] =  $val;
                }
            }
            // dd($cart);
        return $cart;
    }


    public function getCartPrice(){
        $cart_count = 0;  $cart_price = 0; $cart_price_uncash = 0;
        $cart = session()->get('cart', []);
        // dd($cart);
        if($cart){
             foreach($cart as $k=>$v){
                 $cart_price += $v['price'] *  $v['quantity'];
                 $cart_price_uncash += $v['price'] *  $v['quantity'] * 1.03;
                 $cart_count += $v['quantity'];
             }
             if($cart_price > 0) $cart_price = DataService::formatNumber($cart_price);
             if($cart_price_uncash > 0) $cart_price_uncash = DataService::formatNumber($cart_price_uncash);
         }
         return [$cart_price, $cart_count, $cart_price_uncash];
    }


    public static function formatNumber($number){
        return  number_format( str_replace([' ', '.', ','], '', $number), 0, '.', ' ' );
    }


}



?>
