<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class CartController extends Controller
{
    public function addcart(Request $request){

    	$productId = $request->productId;
        $productById = Product::where('id', $request->productId)->first();

    	$data = Cart::add([
            'id'=>$request->productId,
            'name'=>$productById->productName,
            'price'=>$productById->productPrice,
            'qty'=>$request->quantity,
        ]);
    	return redirect('showCart');
    }
    public function showCart(){
    	$cartData = Cart::content();
    	return view('layouts.cart.showCart',compact('cartData'));
    }
    public function delete($id){
    	 Cart::remove($id);
    	return redirect('showCart');
    }
    public function updateQty(Request $request){
    	$quantity = $request->qty;
    	$rowId = $request->cartId;
    	Cart::update($rowId,$quantity); 
    	return redirect('showCart');
    }

}
