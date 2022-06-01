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
    // protected $perpage=3;
    public function index(Request $request)
    {
        $products=Product::paginate(4);
        $categorys=Category::where('status','0')->get(); 
        if($request->ajax()){
            $view=view('frontend.data',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        
        return view('frontend.index',compact('products','categorys'));
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
