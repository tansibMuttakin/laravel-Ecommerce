<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required',
            'categoryImage'=>'required|mimes:jpg,png,jpeg',
        ]);
        $category = new Category;
        $category->name = $request->name;
        if ($request->hasFile('categoryImage')) {
            $file = $request->file('categoryImage');
            $imageName = $file->getClientOriginalName();
            Image::make($file)->resize(286,290)->save(public_path('uploads/categoryImage/'.$imageName));
        }
        $category->image = $imageName;
        $category->save();
        return redirect()->route('category.index')->with('status','category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $target = Category::find($category)->first();
        return view('admin.category.edit')->with('category',$target);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'categoryImage'=>'required|mimes:jpg,png,jpeg',
        ]);
        $target = Category::find($category)->first();
        $target->name = $request->name;
        if($request->hasFile('categoryImage')){
            if (!($target->image == null)) {
                unlink(public_path('uploads/categoryImage/'.$target->image));
            }
            $file = $request->file('categoryImage');
            $imageName = $file->getClientOriginalName();
            Image::make($file)->resize(286,290)->save(public_path('uploads/categoryImage/'.$imageName));
            $target->image = $imageName;
        }
        $target->save();
        return redirect()->route('category.index')->with('status','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $target = Category::find($category)->first();
        if (!($target->image == null)) {
            unlink(public_path('uploads/categoryImage/'.$target->image));
        }
        $target->delete();
        return redirect()->route('category.index')->with('status','category deleted successfully');
    }
}
