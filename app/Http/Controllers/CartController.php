<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {

        $cartItem= session('cart',[]);
        $totalPrice = 0;
        foreach ($cartItem as $cart)
        $totalPrice += $cart['price']* $cart['qty'];

        return view('frontend.pages.cart',compact('cartItem','totalPrice'));
    }
   public function add(Request $request) {
          $productId = $request->product_id;
          $qty = $request->qty;
          $size = $request->size;
         $urun =  Product::find( $productId);
        if(!$urun){

            return back()->withError('product not found.');
        }
        $cartItem = session('cart',[]);

        if(array_key_exists($productId,$cartItem)){
            $cartItem[$productId]['qty']+= $qty;
        }else{
            $cartItem[$productId]=[
                'image'=> $urun->image,
                'name'=> $urun->name,
                'price'=> $urun->price,
                'qty'=> $qty,
                'size'=> $size,
            ];
        }
        session(['cart'=>$cartItem]);
        return  back()->withSuccess('Product Add cart successfully !');


   }
   public function remove(Request $request) {
    $productId = $request->product_id;

    $cartItem = session('cart', []);

    if (array_key_exists($productId, $cartItem)) {
        unset($cartItem[$productId]);
        session(['cart' => $cartItem]);
        return back()->withSuccess('Product removed from cart successfully!');
    } else {
        return back()->withError('Product not found in cart.');
    }

   }

}
