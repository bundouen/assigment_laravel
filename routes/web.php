<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ImportController;
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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



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


    Route::get('import',[ImportController::class,'index']);
    
});