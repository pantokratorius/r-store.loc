<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function import(){

        $res = DB::table('data')->pluck('data');
        if($res) $res = json_decode ($res[0], 1);
        $nacenka = DB::table('nacenka')->pluck('data');
        if($nacenka) $nacenka = json_decode ($nacenka[0], 1);
                //    dd($res);
        
        foreach($nacenka as $k=>$v){
            if(array_key_exists ($k, $res)){
                $res[$k]['nacenka'] = $v;
            }else {
                foreach($res as $key => $val){
                    foreach ($val as $kk => $vv){
                        if($kk == $k){
                            $res[$key][$kk]['nacenka'] = $v;
                        }
                    }
                }
            }
        }

// dd($res);
        return view('admin.import', compact('res'));
    }




    public function importSave(Request $request){
        
        
        
        
        
        
        if(!empty($request->data)){ 
            $dat = explode(PHP_EOL, $request->data);
            
            $key = 'Airpods'; 
            
            foreach($dat as $k=>$v){ 
                if(!empty(preg_replace('!\s++!u', '', $v))){ 
                    // $v = preg_replace('!\s++!u', '', $v);
                    if(strpos ($v, '••') !== false){
                        $key = trim( str_replace(['•', ' '], '',  $v));
                        $res[$key]['real_name'] = trim( str_replace('•', '',  $v));
                        
                    } 
                    else {
                        
                        $key = trim( str_replace(' ', '',  $key));
                        
                        $pos = strrpos($v, '-');
                        if($pos !== false){
                            $price_arr   = explode('-', $v);
                            $price = end($price_arr);
                            $price = preg_replace("/[^,.0-9]/", '', $price);
                            array_pop($price_arr);
                            $real_name = implode('-', $price_arr);  
                            $name =  preg_replace('!\s++!u', '', $real_name);  
                            
                            $res[$key][$name]['price'] = $price ;
                            $res[$key][$name]['real_name'] = $real_name ;
                        }
                        
                    }
                }
            }
            // dd($res);
                DB::table('data')->truncate();
                DB::table('data')->insert([
                    'data' => json_encode($res, JSON_UNESCAPED_UNICODE),
                ]);
                
                $nacenka = DB::table('nacenka')->value('data');
                if($nacenka) $nacenka = json_decode ($nacenka, 1);
                foreach($nacenka as $k=>$v){
                    if(array_key_exists ($k, $res)){
                        $res[$k]['nacenka'] = $v;
                    }else {
                        foreach($res as $key => $val){
                            foreach ($val as $kk => $vv){
                                if($kk == $k){
                                    $res[$key][$kk]['nacenka'] = $v;
                                }
                            }
                        }
                    }
                } 
                
                
            }

            // dd($res);
            
            return view('admin.import', compact('res'));
        }
        
        
        
        public function importPriceSave(Request $request){


            foreach($request->except('_token') as $k=>$v){
                if(!empty($v) && $k != 'type' && $k != 'real_name'){
                    $nacenka[$k] = $v;
                }
            }
//                    dd($nacenka);
        DB::table('nacenka')->truncate();
        DB::table('nacenka')->insert([
            'data' => json_encode( $nacenka, JSON_UNESCAPED_UNICODE),
        ]);

         $res = DB::table('data')->value('data'); 
            if($res) $res = json_decode ($res, 1);
//                 dd($res);
             foreach($nacenka as $k=>$v){ 
                if(array_key_exists ($k, $res)){
                    $res[$k]['nacenka'] = $v;
                }else {
                    foreach($res as $key => $val){
                        foreach ($val as $kk => $vv){
                            if($kk == $k){
                                $res[$key][$kk]['nacenka'] = $v;
                            }
                        }
                    }
                }
            } 
            
            return view('admin.import', compact('res'));
        }
        
    }
    