<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItem=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartItem'));
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
        $prod_qty=$request->input('prod_qty');
        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->first();
            if($prod_check){
                if($prod_check->qty>=$prod_qty){
                    if (Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()) {
                        return response()->json(['status' => "Exist"]);
                    } else {
                        $cartItem=new Cart();
                        $cartItem->user_id=Auth::id();
                        $cartItem->prod_id=$prod_id;
                        $cartItem->prod_qty=$prod_qty;
                        $cartItem->save();
                        return response()->json(['status' =>'success']);
                    }
                }else{
                    return response()->json(['status' => "Out".'-'.$prod_check->qty]);
                    
                }
            }

        }else{
             return response()->json(['status' => "Login"]);
        }
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
    public function updateqty(Request $request)
    {
        if(Auth::check()){
            $prod_id=$request->input('prod_id');
            $newqty=$request->input('prod_qty');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $product=Product::where('id',$prod_id)->first();
                if($newqty<=$product->qty){
                    $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $cartItem->prod_qty=$newqty;
                    $cartItem->update();
                    return response()->json(['status' => "0"]);
                }else{
                    return response()->json(['status' => "1"]);
                }
                
            }

        }else{
            return response()->json(['status' => "2"]);
        }
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
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Deleted cartitem successfully!"]);
            }
            
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
}
