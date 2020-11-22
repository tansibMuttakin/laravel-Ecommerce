<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\ProductSellCount;
use Hash;
use DB;


class UserController extends Controller
{
    public function productFetch(){
        $products = Product::with('productSellCount')->get()->take(9);
        $top_products = DB::table('products')
        ->join('product_sell_counts','products.id','=','product_sell_counts.product_id')
        ->orderBy('product_sell_counts.sell_count','desc')
        ->select('products.*')->get()->take(3);
        $feature_products = Product::where('featured',1)->get()->take(5);
        return view('user.browse')->with('products',$products)->with('top_products',$top_products)
        ->with('feature_products',$feature_products);
    }

    public function index(){
        $users = User::with('roles')->get();
        return view('admin.userList')->with('users',$users);
    }

    public function create(){
        return view('admin.userRegister');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $role = Role::where('name','Normal User')->first();
        if ($role === null) { // when Normal User doesn't exist in db
            
            Role::create([
                'name'=>'Normal User'
            ]);
            $role = Role::where('name','Normal User')->first();
            $user->roles()->attach($role->id);
        }
        else {
            $user->roles()->attach($role->id);
        }
        return redirect()->route('user.index')->with('status','User registered successfully');
    }

    public function show($userId){
        $user = User::with('roles')->where('id',$userId)->first();
        $roles = Role::all();
        return view('admin.roles.assignRoles')->with('user',$user)->with('roles',$roles);
    }

    public function edit($userId){
        $user = User::find($userId);
        return view('admin.userEdit')->with('user',$user);
    }

    public function update(Request $request, $userId){
        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.index')->with('status','User updated successfully');
    }

    public function destroy($userId){
        $user = User::find($userId);
        $user->delete();
        return redirect()->back()->with('status','User deleted successfully');
    }
}
