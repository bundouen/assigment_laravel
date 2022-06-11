<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists=Wishlist::where('user_id',Auth::id())->get();
        return \view('frontend.wishlist',\compact('wishlists'));
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
        $prod_id=$request->input('prod_id');
        // $prod_qty=$request->input('prod_qty');
        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->first();
            if($prod_check){
                if (Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()) {
                    return response()->json(['status' => "Exist"]);
                } else {
                    $wishlists=new Wishlist();
                    $wishlists->user_id=Auth::id();
                    $wishlists->prod_id=$prod_id;
                    // $wishlists->prod_qty=$prod_qty;
                    $wishlists->save();
                    return response()->json(['status' =>'success']);
                }
            }

        }else{
             return response()->json(['status' => "Login"]);
        }
    }
    public function count_record(){
        $count=Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$count]);
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
    public function destroy(Request $request)
    {
        if(Auth::check()){
            $prod_id=$request->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $wishlist=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => "Deleted wishlist successfully!"]);
            }
            
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
}
