<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function index(){
        $products = Product::all();
        $cart = session()->get('cart',[]);
        return view('cart',compact('cart','products'));

    }

    public function addToCart(Request $request){

        $product =Product::findOrFail($request->id);
        $cart= session()->get('cart',[]);

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity']++;
        }else{
            $cart[$product->id]=[
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1
            ];

        }
        session()->put('cart',$cart);
        return response()->json(['success'=>true,'cart'=>$cart]);
    }
}
