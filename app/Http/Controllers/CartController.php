<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Arispati\EmojiRemover\EmojiRemover;
use Illuminate\Support\Str;
use App\Services\DataService;

class CartController extends Controller
{
    


    public function index()
    {   
        $products = DB::table('data')->pluck('data');
        return view('products', compact('products'));
    }
  
    public function productCart()
    {
        return view('cart');
    }

    
    public function addProducttoCart($category, $item, DataService $dataservice)
    {
        $category = Str::replace('-', '/', $category);
        $item = Str::replace('-', '', $item);

        $id = $category . '%%' . $item;

        $data =  $dataservice->getAllData();
     

        $group = $data[$category];

 
        
        $result = $group[$item];
        

        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "quantity" => 1,
                "price" => $result['price']
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
    
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart.');
        }
    }
  
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
    }
}


