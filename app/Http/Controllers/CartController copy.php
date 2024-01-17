<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Arispati\EmojiRemover\EmojiRemover;
use App\Services\DataService;

class CartController extends Controller
{
    


    public function __invoke(DataService $dataservice)
    {   
        $cart = $dataservice->getCartData();
    //    dd($cart);

        return view('cart', compact('cart') );
    }
  
    public function productCart()
    {
        return view('cart');
    }

    
    public function addProducttoCart($raw_category, $raw_item,  DataService $dataservice)
    {
        $category = str_replace('-', '/', $raw_category);
        $item = str_replace('-', '', $raw_item);

        $id = $category . '$$' . $item;

        $data =  $dataservice->getAllData();
     

        $group = $data[$category];

 
        
        $result = $group[$item];

        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "quantity" => 1,
                "price" => str_replace(' ', '', $result['price']),
                "name" =>  trim( $result['real_name']) 
            ];
        }

        // dd($raw_item);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

      
    public function updateCart($category_name, $up_down, DataService $dataservice)
    {
        $cart = session()->get('cart');

        if(isset($cart[$category_name])){
            if($up_down == 'up')
                $cart[$category_name]['quantity'] += 1;
            elseif($up_down == 'down' && $cart[$category_name]['quantity'] > 1){ 
                $cart[$category_name]['quantity'] -= 1;
            }
            session()->put('cart', $cart);
        }

        $cart = $dataservice->getCartData();

        return view('cart', compact('cart') );
    }
  
    public function deleteProductCart( $category_name, DataService $dataservice)
    {

        $cart = session()->get('cart');

        if(isset($cart[$category_name])){
            unset($cart[$category_name]);
            session()->put('cart', $cart);
        }
        
        $cart = $dataservice->getCartData();


      
        return view('cart', compact('cart') );
    }
}


