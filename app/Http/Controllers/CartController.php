<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Arispati\EmojiRemover\EmojiRemover;
use App\Services\DataService;
use Common;

class CartController extends Controller
{



    public function __invoke(DataService $dataservice)
    {
        $cart = $dataservice->getCartData();
        $links = [];
        foreach($cart as $k=>$v){
             list($cat, $item) = explode('$$', $k);
             $links[$k]['cat'] = str_replace('/', '-', $cat);
             $links[$k]['item'] = str_replace('/', '-', $item);
             $img = DB::table('images')->where('ref_id', $item)->pluck('image_link');
        }

        $transfer = $dataservice->getAllData();
                foreach ($transfer as $k => $v) {
                    $name = EmojiRemover::filter($v['real_name']);
                    $cats[$k] = $name;
                }
                $cats = array_reverse($cats);


        return view('frontend.cart', compact('cart', 'links', 'cats') );
    }

    public function productCart()
    {
        return view('frontend.cart');
    }


    public function addProducttoCart($raw_category, $raw_item, DataService $dataservice, Request $request )
    {
        $success = 'Корзина обновлена!';
        $category = str_replace('-', '/', $raw_category);
        $item = str_replace('-', '', $raw_item);

        $id = $category . '$$' . $item;
        $data =  $dataservice->getAllData();



        if(!isset($data[$category]))
            abort(404);

        $group = $data[$category];

   foreach($group as $k => $v){
        if(is_array($v)){
                    $temp_data[ str_replace([' ', '-', '/'], '', $v['real_item_name'] ) ]= $v;
        }
    }

        $result = $temp_data[$item];

        $cart = session()->get('cart', []);

        $search_image_item = EmojiRemover::filter($item);
        $search_image_item = str_replace(['Iphone', 'Watch'], '',$search_image_item);

        if(isset($cart[$id])) {
            if($request->has('minus') && $cart[$id]['quantity'] > 1){
                $cart[$id]['quantity']--;
            }else{
                $cart[$id]['quantity']++;
            }
        } else {
            $img = DB::table('images')->where('ref_id', $search_image_item)->pluck('image_link');  
            $cart[$id] = [
                "quantity" => 1,
                "price" => str_replace(' ', '', $result['price']),
                "name" =>  trim( $result['real_item_name_ru']),
                "category" => $raw_category,
                "item" => $raw_item,
            ];
            if(count($img))
                $cart[$id]['image'] = $img[0];
        }

        // dd($raw_item);
        session()->put('cart', $cart);

        if($request->ajax() ) {

            $price = $dataservice->getCartPrice();
            $price[] = $success;
            $price[] = $cart[$id]['quantity'];
            return response()->json($price, 200);
        }

        return redirect()->back()->with('success', $success);
    }

    public function oneclickProducttoCart($raw_category, $raw_item, DataService $dataservice)
    {
        $names_my = Common::$names;
        $category = str_replace('-', '/', $raw_category);
        $item = str_replace('-', '', $raw_item);

        $id = $category . '$$' . $item;
        $data =  $dataservice->getAllData();

        if(!isset($data[$category]))
            abort(404);

        $group = $data[$category];
        
        foreach($group as $k => $v){
            if(is_array( $v))
            $mass[ str_replace([' ', '-', '/'], '',  $v['real_item_name'] ) ]=  $v;
    }
    

        $result = $mass[$item];

        $cart = [];


        $search_image_item = EmojiRemover::filter($item);
        $search_image_item = str_replace(['Iphone', 'Watch'], '',$search_image_item);

            $img = DB::table('images')->where('ref_id', $search_image_item)->pluck('image_link');
            $cart[$id] = [
                "quantity" => 1,
                "price" => str_replace(' ', '', $result['price']),
                "name" =>  trim( $result['real_item_name_ru']),
                "category" => $raw_category,
                "item" => $raw_item,
            ];
            if(count($img))
                $cart[$id]['image'] = $img[0];

            $cart[$id]['price_uncash'] = $dataservice->formatNumber( $cart[$id]['price'] * Common::$uncash );
            $cart[$id]['price'] = $dataservice->formatNumber( $cart[$id]['price']  );
            foreach($names_my as $nam){ //dd($k, $nam);
                if(stripos($id, $nam) !==false){
                    $cart[$id]['real_item_name'] = $nam. ' '. $cart[$id]['name'];
                    break;
                }
                else {
                    $cart[$id]['real_item_name'] =  $cart[$id]['name'];
                }
            }

            $oneclick = true;
// dd($cart);
        if(count($cart) < 1 )
            return view('frontend.cart', compact('cart') );
        return view('frontend.order', compact('cart', 'oneclick') );



    }


    public function updateCart($raw_category, $raw_item, $quantity, DataService $dataservice, Request $request )
    {
        $success = 'Корзина обновлена!';
        $category = str_replace('-', '/', $raw_category);
        $item = str_replace('-', '', $raw_item);

        $id = $category . '$$' . $item;
        $data =  $dataservice->getAllData();

        $group = $data[$category];

        foreach($group as $k => $v){
            if(is_array($v)){
                        $temp_data[ str_replace([' ', '-', '/'], '', $v['real_item_name'] ) ]= $v;
            }
        }


        $result = $temp_data[$item];

        $cart = session()->get('cart');

        $cart[$id]['quantity'] = $quantity;

        session()->put('cart', $cart);
        // dd($cart, $id);

        if($request->ajax() ) {

            $price = $dataservice->getCartPrice();
            $price[] = $success;
            $price[] = $dataservice->formatNumber( $cart[$id]['quantity'] * $cart[$id]['price'] );
            return response()->json($price, 200);
        }


        return view('frontend.cart', compact('cart', 'links') );
    }

    public function deleteProductCart( $category_name, DataService $dataservice)
    {
        $category_name = str_replace('-','/', $category_name);

        $cart = session()->get('cart');
        $links = [];
        foreach($cart as $k=>$v){
            list($cat, $item) = explode('$$', $k);
            $links[$k]['cat'] = str_replace('/', '-', $cat);
            $links[$k]['item'] = str_replace('/', '-', $item);
       }

        if(isset($cart[$category_name])){
            unset($cart[$category_name]);
            session()->put('cart', $cart);
        }

        $cart = $dataservice->getCartData();


        return view('frontend.cart', compact('cart', 'links') );
    }
}


