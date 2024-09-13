<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use Arispati\EmojiRemover\EmojiRemover;
use Common;

class DataService {

    public function getAllData(){

        $names_my = ['iPhone', 'Watch'];
        $fullName = [1 => 'Apple Watch'];
        // $names_my = ['aaaaaaaaa'];
        // $fullName = [];


        $data =  DB::table('data_new')->pluck('data');
        if(!empty($data[0])) $data = json_decode ($data[0], 1);
        $nacenka = DB::table('nacenka_new')->pluck('data');
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
        // $k = EmojiRemover::filter($k);
        if( !empty($new_nacenka[$k]) ){
            $nacenk = $new_nacenka[$k]; 
            foreach ($new_data[$k] as $key => $val) { 
                // $key = EmojiRemover::filter($key);
                $key = str_replace(['/', '-'],'',$key);
                if($key != 'real_name'){
                    $transfer[$k][$key]['price'] = isset($new_nacenka[$key]) ? self::formatNumber($new_nacenka[$key]) : self::formatNumber(  (int)str_replace('.','',$val['price'])  + $nacenk );
                    foreach($names_my as $kk => $nam){ //dump([$nam, $k]);
                        if(stripos($k, $nam) !==false){
                            $transfer[$k][$key]['real_item_name_ru'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' . $this->getName( (isset($fullName[$kk]) ? $fullName[$kk] : $nam .  str_replace($em, '', $val['real_name'] )) ) ; 
                            $transfer[$k][$key]['real_item_name'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' .  (isset($fullName[$kk]) ? $fullName[$kk] : $nam .  str_replace($em, '', $val['real_name'] )) ; 
                            break;
                        }
                        else {
                            $transfer[$k][$key]['real_item_name_ru'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' . $this->getName( str_replace($em, '', $val['real_name'] ));
                            $transfer[$k][$key]['real_item_name'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' .  str_replace($em, '', $val['real_name'] );
                        }
                    }
                    $transfer[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                }
                else $transfer[$k][$key] = EmojiRemover::filter( $val);
                
            }
        }else{
                foreach ($new_data[$k] as $key => $val) {
                // $key = EmojiRemover::filter($key);
                $key = str_replace(['/', '-'],'',$key);
                    if($key != 'real_name'){
                        $transfer[$k][$key]['price'] =  isset($new_nacenka[$key]) ? self::formatNumber($new_nacenka[$key]) : self::formatNumber( (int)str_replace('.','',$val['price'] ) + 5000 );    //save([$res[$k],  $val ]);

                        foreach($names_my as $kk => $nam){//dump($names_my);
                            if(stripos($k, $nam) !==false){             // && stripos($val['real_name'], $nam) === false
                                $transfer[$k][$key]['real_item_name_ru'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' . $this->getName( (isset($fullName[$kk]) ? $fullName[$kk] : $nam.  str_replace($em, '', $val['real_name'] )) ) ;
                                $transfer[$k][$key]['real_item_name'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' .  (isset($fullName[$kk]) ? $fullName[$kk] : $nam.  str_replace($em, '', $val['real_name'] ))  ;
                                break;
                            }
                            else {
                                $transfer[$k][$key]['real_item_name_ru'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' . $this->getName( str_replace($em, '', $val['real_name'] ));
                                $transfer[$k][$key]['real_item_name'] = ($em = EmojiRemover::getEmoji( $val['real_name']) ) . ' ' .  str_replace($em, '', $val['real_name'] );
                            }
                        }
                        $transfer[$k][$key]['real_name'] = EmojiRemover::filter( $val['real_name']);
                    }
                else $transfer[$k][$key] = EmojiRemover::filter( $val);

            }
        }
        // dump($transfer);
        }

        return $transfer;
    }

    public function getName($name){

// dump($name);



        $replace = [
            'Black' => '"тёмная ночь"',
            'Midnight' => '"тёмная ночь"',
            'Starlight' => '"сияющая звезда"',
            'Red' => 'красный',
            'Pink' => 'розовый',
            'Blue' => 'синий',
            'Green' => 'зеленый',
            'Purple' => 'фиолетовый',
            'White' => 'белый',
            'Yellow' => 'желтый',
            'Gold' => 'золотой',
            'Silver' => 'серебристый',
        ];
        // $replace =  array_change_key_case($replace);

        $names = ['MacBook', 'ipad'];


        foreach($names as $k => $v){
            if(stripos( str_replace(' ', '', $name), $v) !== false){
                $replace['Gray'] = '"серый космос"';
                $replace['WF'] = 'Wi-Fi';
                $replace['LTE'] = 'Wi-Fi+LTE';
                $replace['.'] = ',';
                $name = strtr($name, $replace);
            }
        }


        // -------------------  Apple Watch --------------
        $names = ['WatchSE'];

        foreach($names as $k => $v){
            if(stripos( str_replace(' ', '', $name), $v) !== false){
                $replace['Black'] = '"черный космос"';
                $replace['Purple'] = 'тёмно-фиолетовый';
                $name = strtr($name, $replace);
            }
        }
        // -------------------  Apple Watch --------------

        

        $replace = array_map(function($a){return 'ГБ, '.$a;}, $replace);


        $names = ['14Pro'];

        foreach($names as $k => $v){
            if(stripos( str_replace(' ', '', $name), $v) !== false){
                $replace['Black'] = '"черный космос"';
                $replace['Purple'] = 'тёмно-фиолетовый';
                $name = strtr($name, $replace);
            }
        }
        if(stripos(str_replace(' ', '', $name), '15Pro') !== false){
            $replace = [
                    'Red' => 'красный',
                    'Pink' => 'розовый',
                    'Blue' => 'синий',
                    'Green' => 'зеленый',
                    'Purple' => 'фиолетовый',
                    'White' => 'белый',
                    'Yellow' => 'желтый',
                    'Gold' => 'золотой',
                    'Silver' => 'серебристый',
                    'Blue' => 'голубой',
                    'Natural' => 'титановый',
                    'Black' => 'черный'
                ];
                // $replace =  array_change_key_case($replace);
                $replace = array_map(function($a){return 'ГБ, Титановый '.$a;}, $replace);
                $replace['Natural'] = 'Титановый';
                $name = strtr($name, $replace);
            }



        $names = ['13mini', 'Iphone13', '12mini', 'Iphone12', 'Iphone14'];

// dump($replace);
        foreach($names as $k => $v){ //dump((stripos( str_replace(' ', '', $name), $v) !== false) );
            if(stripos( str_replace(' ', '', $name), $v) !== false){
                $name = strtr($name, $replace);
            }
        }


        $names = ['Iphone11', 'IphoneSE', 'iphone15'];

        foreach($names as $k => $v){
            if(stripos( str_replace(' ', '', $name), $v) !== false){ 
                $replace['Black'] = 'черный'; //dd($replace);
                $name = strtr($name, $replace);
            }
        }



        return $name;
    }


    public function getCartData(){
        $temp = session()->get('cart', []);
        $cart = []; $names_my = Common::$names;
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
                                $cart[$k]['real_item_name'] = $this->getName($nam. ' '. $val);
                                break;
                            }
                            else {
                                $cart[$k]['real_item_name'] =  $this->getName($val);
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
                 $cart_price_uncash += $v['price'] *  $v['quantity'] * Common::$uncash;
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
