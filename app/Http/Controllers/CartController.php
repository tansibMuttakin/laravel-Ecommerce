<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product){
        
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'associatedModel' => $product
        ));
        notify()->success('Product Added!');
        return redirect()->back()->with('status','Item added to your cart');

    }

    public function index(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.index')->with('items',$cartItems);
    }


    public function destroy($itemId){

        \Cart::session(auth()->id())->remove($itemId);
        return redirect()->back();
    }

    public function update(Request $request, $itemId){

        \Cart::session(auth()->id())->update($itemId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        // session()->flash('status','Cart updated');
        return response()->json(['success'=>true,'status'=>'Cart Updated']);
    }

    public function order(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.order')->with('items',$cartItems);
    }
}
