<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function prices(){

        $res = DB::table('data')->pluck('data');
        if($res) $res = json_decode ($res[0], 1);
        $nacenka = DB::table('nacenka')->pluck('data');
        if($nacenka) $nacenka = json_decode ($nacenka[0], 1);
                //    dd($res);
        
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

// dd($res);
        return view('admin.prices', compact('res'));
    }

    public function import(){

        
        return view('admin.import');
    }








}
