<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $k=1;
        return view("admin.category.index",compact('categories','k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $category=new Category();
        $existCategory=Category::where('name','=',$req->input('name'))->first();
        if($existCategory!=null){
            return redirect()->back()->with('status','The categroy already exist!');
        }
        if($req->hasFile('photo')){
            $file=$req->file('photo');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'. $ext;
            
            $file->move('asset/uploads/category/', $filename);
            $category->image=$filename;
            }
            $category->name=$req->input('name');
            $category->slug=$req->input('slug');
            $category->description=$req->input('description');
            $category->status=$req->input('status')== TRUE ? '1':'';
            $category->popular=$req->input('popular')== TRUE ? '1':'';
            $category->meta_title=$req->input('meta_title');
            $category->meta_descrip=$req->input('meta_descrip');
            $category->meta_keywords=$req->input('meta_keywords');
            $category->save();
            return redirect()->back()->with('status','Insert to category successfully');
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
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        $category=Category::find($id);
        if($req->hasFile('photo')){
            $path='asset/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$req->file('photo');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'. $ext;
           $file->move('asset/uploads/category/', $filename);
           $category->image=$filename;
        }
        $category->name=$req->input('name');
        $category->slug=$req->input('slug');
        $category->description=$req->input('description');
        $category->status=$req->input('status')== TRUE ? '1':'';
        $category->popular=$req->input('popular')== TRUE ? '1':'';
        $category->meta_title=$req->input('meta_title');
        $category->meta_descrip=$req->input('meta_descrip');
        $category->meta_keywords=$req->input('meta_keywords');
        $category->update();
        return redirect('category')->with('status','Category updated successfully');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category->image){
            $path='asset/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('category');
    }
}
