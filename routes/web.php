<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;

use App\Http\Middleware\CheckAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user.browse');
// });

Route::get('/', [UserController::class, 'productFetch'])->name('products.fetch');
Route::get('/product/{productId}', [FrontEndController::class, 'viewProduct'])->name('frontEndProduct.view');
Route::get('/products/all', [FrontEndController::class, 'allproducts'])->name('allProducts.view');
Route::get('/category/{categoryId}', [FrontEndController::class, 'viewProductByCategory'])->name('categoryProduct.view');
Route::get('/search/product', [FrontEndController::class, 'searchProduct'])->name('frontEndProduct.search');
Route::get('/order/track', [FrontEndController::class, 'trackOrder'])->name('order.track');
Route::get('/order/pending/track', [FrontEndController::class, 'trackPendingOrder'])->name('pendingOrder.track');

//cart routes
Route::group(['prefix' => 'cart',  'middleware' => 'auth'], function(){

  Route::get('/add-to-cart/{product}',[CartController::class,'add'])->name('cart.add');
  Route::get('/index',[CartController::class,'index'])->name('cart.index');
  Route::get('/destroy/{itemId}',[CartController::class,'destroy'])->name('cart.destroy');
  Route::post('/update/{itemId}',[CartController::class,'update'])->name('cart.update');
  Route::get('/order',[CartController::class,'order'])->name('cart.order');
});

//order route
Route::group(['prefix'=>'order', 'middleware' => 'auth'],function(){

    //general user -> order store to cart
    Route::post('/store',[OrderController::class,'store'])->name('order.store');
    
    //admin -> order routes
    Route::get('/',[OrderController::class,'index'])->name('order.index');
    Route::get('/show/{orderId}',[OrderController::class,'show'])->name('order.show');
    Route::get('/update/status/{orderId}',[OrderController::class,'updateStatus'])->name('order.updtaeStatus');
    Route::get('/destroy/{orderId}',[OrderController::class,'destroy'])->name('order.destroy');
});


Route::group(['middleware' => 'checkAdmin'], function() {
    //admin -> product control routes
    Route::resource('products', ProductController::class);
    //admin -> category control routes
    Route::resource('category', CategoryController::class);
    Route::get('/categories/create',[CategoryController::class,'create'])->name('admin.category.create');

    //admin -> user control routes
    Route::get('/user/list', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{userId}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{userId}', [UserController::class, 'update'])->name('user.update');

    Route::get('/user/roles/assign/{userId}', [UserController::class, 'show'])->name('user.show')->middleware('cannotChange');
    Route::get('/user/delete/{userId}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('cannotChange');
    
    //admin -> roles control routes
    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('cannotChange');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store')->middleware('cannotChange');
    Route::post('/roles/update/{roleId}', [RoleController::class, 'update'])->name('roles.update')->middleware('cannotChange');
    Route::get('/roles/edit/{roleId}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('cannotChange');
    Route::get('/roles/delete/{roleId}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('cannotChange');
    Route::post('/roles/assign/{userId}', [RoleController::class, 'assign'])->name('roles.assign')->middleware('cannotChange');
  });


// Route::get('/index', [ProductController::class, 'index'])->name('products.index');
// Route::get('/create', [ProductController::class, 'create'])->name('products.create');
// Route::get('/store', [ProductController::class, 'store'])->name('products.store');
// Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
// Route::post('/update/{product}', [ProductController::class, 'update'])->name('products.update');
// Route::post('/update/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::middleware(['checkAdmin','auth','auth:sanctum', 'verified'])->get('/index', [ProductController::class, 'index'])->name('products.index');

//social login routes
Route::get('login/github', 'App\Http\Controllers\SocialiteLoginController@redirectToProvider');
Route::get('login/github/callback', 'App\Http\Controllers\SocialiteLoginController@handleProviderCallback');