<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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
        $k=1;
        return view('admin.product.index',compact('products','k'));
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
        $req->validate([
            'cate_id'=>'required',
            'name'=>'required|min:2',
            'small_description'=>'required|min:6',
            'description'=>'required|min:10',
            'original_price'=>'required',
            'selling_price'=>'required',
            'qty'=>'required',
            'tax'=>'required',
        ],
        [
            'cate_id.required'=>'Please select category',
            'name.required'=>'Please input your product name',
            'selling_price.required'=>'Please input your selling price',
            'qty.required'=>'Please input quantity of product',
            
        ]
    );
        $products=new Product();
        $existProduct = Product::where('name', '=', $req->input('name'))->first();
        if($existProduct!=null){
              return redirect()->back()->with('status','The product name exist already!');
        }
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
            $products->status=$req->input('status')== TRUE ? '1':'0';
            $products->trending=$req->input('trending')== TRUE ? '1':'0';
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
    public function update(Request $req, $id)
    {
        $product=Product::find($id);
        if($req->hasFile('photo')){
            $path='asset/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$req->file('photo');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'. $ext;
           $file->move('asset/uploads/product/', $filename);
           $product->image=$filename;
        }
        $product->cate_id=$req->input('cate_id');
        $product->name=$req->input('name');
        $product->small_description=$req->input('small_description');
        $product->description=$req->input('description');
        $product->original_price=$req->input('original_price');
        $product->selling_price=$req->input('selling_price');
        $product->qty=$req->input('qty');
        $product->tax=$req->input('tax');
        $product->status=$req->input('status')== TRUE ? '1':'0';
        $product->trending=$req->input('trending')== TRUE ? '1':'0';
        $product->meta_title=$req->input('meta_title');
        $product->meta_description=$req->input('meta_description');
        $product->meta_keywords=$req->input('meta_keywords');
        $product->update();
        return redirect('product')->with('status','Product updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product->image){
            $path='asset/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        // return redirect('product')->with('status','Product deleted successfully');
         return redirect()->back();
    }
}
