<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

class FrontEndController extends Controller
{
    public function viewProduct($productId){
        $product = Product::with('category')->where('id',$productId)->first();
        $relatedProducts = Product::whereHas('category',function(Builder $query) use($productId,$product){
            $query->where('id',$product->category->id);
        })->where('id','!=',$productId)->get()->take(4);
        return view('user.singleProdView')->with('product',$product)->with('relatedProducts',$relatedProducts);
    }
    public function allproducts()
    {
        $products = Product::with('category')->paginate(12);
        return view('user.allProducts')->with('products',$products);
    }
    public function searchProduct(Request $request){
        $array = [];
        $query = request()->input('query');
        $products = Product::with('category')->where('name','like',$query.'%')->get();
        return view('user.searchResult')->with('products',$products);
    }

    public function viewProductByCategory($categoryId){

        $category = Category::where('id',$categoryId)->first();
        $products = Product::with('category')->where('category_id',$categoryId)->get();
        return view('user.categoryProductView')->with('products',$products)->with('category',$category);
    }

    //handle Track Order of User
    public function trackOrder(){
        $orders = Order::with('products')->where('user_id',auth()->id())->get();
        $pendingOrders = Order::with('products')->where('user_id',auth()->id())->where('status',0)->get();
        // dd($orders);
        return view('user.trackOrder')->with('orders',$orders)->with('pendingOrders',$pendingOrders);
    }

    public function trackPendingOrder(){
        $pendingOrders = Order::with('products')->where('user_id',auth()->id())->where('status',0)->get();
        return view('user.trackPendingOrder')->with('pendingOrders',$pendingOrders);
    }
}
