<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function index()
    {
        $res =  DB::table('data')->pluck('data');
        if(!empty($res[0])) $res = json_decode ($res[0], 1);
        $nacenka = DB::table('nacenkas')->pluck('data'); 

        if(!empty($nacenka[0])) $nacenka = json_decode ($nacenka[0], 1);

        foreach($nacenka as $k=>$v){
            if($res[$k]){
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

        return view('home', compact('res'));
    }


    public function category($id){
        dd($id); 
    }

    public function item($id){
        dd($id);
    }

}
