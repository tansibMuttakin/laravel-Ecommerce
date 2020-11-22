<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductSellCount;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.orderList')->with('orders',$orders);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'paymentMethod'=>'required',
        ]);

        $order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->user_id = auth()->id();
        $carItems = \Cart::session(auth()->id())->getContent();
        $order->grandTotal = \Cart::session(auth()->id())->getTotal();
        $order->itemCount = \Cart::session(auth()->id())->getContent()->count();
        $order->paymentMethod = $request->paymentMethod;
        $order->save();

        //save order_product
        $carItems = \Cart::session(auth()->id())->getContent();
        foreach($carItems as $item){
            $order->products()->attach($item->id,['price'=>$item->price,'quantity'=>$item->quantity]);
            $product_sell_count = ProductSellCount::where('product_id',$item->id)->first();
            if ($product_sell_count == null) {
                ProductSellCount::insert([
                    'product_id' => $item->id,
                    'sell_count' => 1
                ]);
            }
            else{
                $target_product_sell = ProductSellCount::where('product_id',$item->id)->first();
                $target_product_sell->sell_count = $target_product_sell->sell_count+1;
                $target_product_sell->save();
            }
        }

        //payment method

        // if ($request->paymentMethod == 'bkash') {
        //     dd('bkash payment','Your order is saved');
        // }
        // else{
        //     dd('cash on delivery','Your order is saved');
        // }

        //clear cart
        \Cart::session(auth()->id())->clear();
        return redirect()->route('products.fetch')->with('status','Order placed successfully! Now you can track your order');
    }

    public function show($orderId){
        $orders = Order::with('products')->find($orderId);
        $totalBill=0;
        foreach ($orders->products as $product) {
            $totalBill += ($product->pivot->price)*($product->pivot->quantity); 
        }
        return view('admin.orderDetails')->with('orders',$orders)->with('totalBill',$totalBill);
    }
    public function destroy($orderId){
        $order = Order::find($orderId);
        $order->delete();
        return redirect()->route('order.index');
    }
}
