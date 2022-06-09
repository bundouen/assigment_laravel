<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ImportController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Category\CategoryController;

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
//     return view('welcome');
// });
Route::get('/',[FrontendController::class,'index']);
Route::get('feature_category',[FrontendController::class,'category']);
Route::get('view_category/{id}',[FrontendController::class,'viewcategory']);
Route::get('view_category/{cate_id}/{pid}',[FrontendController::class,'viewproduct']);

Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendController::class, 'searchProduct']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('addtocart',[CartController::class,'store']);
Route::post('delete_cart_item',[CartController::class,'destroy']);
Route::post('update_qty',[CartController::class,'updateqty']);


Route::middleware(['auth'])->group(function () {
    Route::get('cart',[CartController::class,'index']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place_order',[CheckoutController::class,'store']);
    Route::get('my_orders',[OrderController::class,'index']);
    
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
//category
    Route::get('category',[CategoryController::class,'index']);
    Route::get('create_category',[CategoryController::class,'create']);
    Route::post('store_category',[CategoryController::class,'store']);
    Route::get('edit_category/{id}',[CategoryController::class,'edit']);
    Route::put('update_category/{id}',[CategoryController::class,'update']);
    Route::get('delete_category/{id}',[CategoryController::class,'destroy']);
//product
    Route::get('product',[ProductController::class,'index']);
    Route::get('create_product',[ProductController::class,'create']);
    Route::post('store_product',[ProductController::class,'store']);
    Route::get('edit_product/{id}',[ProductController::class,'edit']);
    Route::put('update_product/{id}',[ProductController::class,'update']);
    Route::get('delete_product/{id}',[ProductController::class,'destroy']);

//Order
    Route::get('orders',[AdminOrderController::class,'index']);
    // Route::get('view-pdf/{id}',[AdminOrderController::class,'view_pdf']);
    Route::get('print-pdf/{id}',[AdminOrderController::class,'printpdf']);
    Route::get('print-pdf',[AdminOrderController::class,'payment']);
    
    
//User
    Route::get('users',[DashboardController::class,'user']);

    Route::get('import',[ImportController::class,'index']);
    
});