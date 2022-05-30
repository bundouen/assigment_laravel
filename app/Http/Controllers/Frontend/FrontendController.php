<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature_product=Product::where('trending','1')->take(15)->get();
        $trending_category=Category::where('popular','1')->take(15)->get(); 
        
        return view('frontend.index',compact('feature_product','trending_category'));
    }
    public function category()
    {
        $feature_category=Category::where('status','0')->get();
        return view('frontend.category',compact('feature_category'));
    }
    public function viewcategory($id){
        if(Category::where('id',$id)->exists()){
            $category=Category::where('id',$id)->first();
            $cateId=$category->id;
            $productbyid=Product::where('cate_id',$cateId)->where('status','0')->get();
            return view('frontend.product.index',compact('category','productbyid'));
        }else{
            return redirect('/')->with('status','Category does not exist!');
        }
        
    }
    public function viewproduct ($cate_id,$pid)
    {
        if(Category::where('id',$cate_id)->exists()){
            if(Product::where('id',$pid)->exists()){
                $productdetail=Product::where('id',$pid)->first();
                return view('frontend.product.productdetail',compact('productdetail'));
            }else{
                return redirect('/')->with('status','The link broken!');
            }
        }else{
            return redirect('/')->with('status','Category not found!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
