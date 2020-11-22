<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.productCreateForm')->with('categories',$categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'productName'=>'required',
            'productPrice'=>'required',
            'ProductImage'=>'mimes:jpg,png,jpeg',
            'featured'=>'required'
        ]);

        $product = new Product;
        $product->name = $request->productName;
        $product->price = $request->productPrice;
        if ($request->category == null) {
            return redirect()->back()->with('warning','You must select a category');
        }
        if (count($request->category)>1) {
            return redirect()->back()->with('warning','You can select only one category for an item');
        }else {
            $product->category_id = json_decode($request->category[0])->id;
        }
        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            $imageName = $file->getClientOriginalName();
            Image::make($file)->resize(80,60)->save(public_path('uploads/thumbnails/'.$imageName));
            Image::make($file)->resize(530,640)->save(public_path('uploads/large/'.$imageName));
            Image::make($file)->resize(200,200)->save(public_path('uploads/small/'.$imageName));
            Image::make($file)->resize(248,150)->save(public_path('uploads/medium/'.$imageName));

            
            $imageName = $file->getClientOriginalName();
            $product->image = $imageName;
            // $image->move(public_path('uploads'), $imageName);
        }
        // $product->featured = $request->featured;
        $product->description = $request->productDescription;
        $product->save();
        return redirect()->route('products.index')->with('status','Product added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $target = Product::with('category')->where('id',$product->id)->first();
        return view('admin.editProduct')->with('product',$target)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'productName'=>'required',
            'productPrice'=>'required',
            'ProductImage'=>'mimes:jpg,png,jpeg',
        ]);

        $target = Product::where('id',$product->id)->first();
        $target->name = $request->productName;
        if ($request->category==null) {
            return redirect()->back()->with('warning','You must select a category');
        }
        if (count($request->category)>1) {
            return redirect()->back()->with('warning','You can select only one category for an item');
        }
        $target->category_id = json_decode($request->category[0])->id;
        $target->price = $request->productPrice;

        if ($request->hasFile('productImage')) {
            if (!($target->image == null)) {
                unlink(public_path('uploads/thumbnails/'.$target->image));
                unlink(public_path('uploads/img-fullview/'.$target->image));
                unlink(public_path('uploads/img-relatedview/'.$target->image));
                unlink(public_path('uploads/img-topview/'.$target->image));
                unlink(public_path('uploads/img-listview/'.$target->image));
            }
            $file = $request->file('productImage');
            $imageName = $file->getClientOriginalName();
            Image::make($file)->resize(80,60)->save(public_path('uploads/thumbnails/'.$imageName));
            Image::make($file)->resize(530,640)->save(public_path('uploads/img-fullview/'.$imageName));
            Image::make($file)->resize(200,200)->save(public_path('uploads/img-relatedview/'.$imageName));
            Image::make($file)->resize(362,259)->save(public_path('uploads/img-topview/'.$imageName));
            Image::make($file)->resize(330,370)->save(public_path('uploads/img-listview/'.$imageName));
            $target->image = $imageName;
        }
        $target->description = $request->productDescription;
        $target->save();
        return redirect()->route('products.index')->with('status','Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $target = Product::find($product)->first();
        if (!($target->image == null)) {
            unlink(public_path('uploads/thumbnails/'.$target->image));
            unlink(public_path('uploads/img-fullview/'.$target->image));
            unlink(public_path('uploads/img-relatedview/'.$target->image));
            unlink(public_path('uploads/img-topview/'.$target->image));
            unlink(public_path('uploads/img-listview/'.$target->image));
        }
        $target->delete();
        return redirect()->route('products.index')->with('status','Product deleted!');
    }
}
