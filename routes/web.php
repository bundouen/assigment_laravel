<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ImportController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index']);

    Route::get('category',[CategoryController::class,'index']);
    Route::get('create_category',[CategoryController::class,'create']);
    Route::post('store_category',[CategoryController::class,'store']);
    Route::get('edit_category/{id}',[CategoryController::class,'edit']);
    Route::put('update_category/{id}',[CategoryController::class,'update']);
    Route::get('delete_category/{id}',[CategoryController::class,'destroy']);


    Route::get('import',[ImportController::class,'index']);
    
});