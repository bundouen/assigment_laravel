<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $products=new Product();
        
        if($req->hasFile('photo')){
           $file=$req->file('photo');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'. $ext;
          
           $file->move('asset/uploads/product/', $filename);
           $products->image=$filename;
        }
        $products->cate_id=$req->input('cate_id');
        $products->name=$req->input('name');
        $products->small_description=$req->input('small_description');
        $products->description=$req->input('description');
        $products->original_price=$req->input('original_price');
        $products->selling_price=$req->input('selling_price');
        $products->qty=$req->input('qty');
        $products->tax=$req->input('tax');
        $products->status=$req->input('status')== TRUE ? '1':'';
        $products->trending=$req->input('trending');

        $products->meta_title=$req->input('meta_title');
        $products->meta_description=$req->input('meta_description');
        $products->meta_keywords=$req->input('meta_keywords');
        $products->save();
        return redirect('create_product')->with('status','Insert to products successfully');
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
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.product.edit',compact('product','categories'));
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
