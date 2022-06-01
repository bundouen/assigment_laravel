<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $k=1;
        $old_cart_items=Cart::where('user_id',Auth::id())->get();
        foreach($old_cart_items as $item){
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){
                $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cart_items=Cart::where('user_id',Auth::id())->get();
        $reciever=Order::where('user_id',Auth::id())->orderBy('id', 'DESC')->first();
        return view('frontend.checkout',compact('cart_items','k','reciever'));
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
        $date=strtotime("2022/06/01"); ;
        $order=new Order;
        $order->user_id=Auth::user()->id;  //Auth::id()
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address1=$request->input('address1');
        $order->address2=$request->input('address2');
        $order->city=$request->input('city');
        $order->tracking=$request->input('tracking');
        $order->total=$request->input('total');
        $order->save();
        $cart_items=Cart::where('user_id',Auth::id())->get();
        foreach($cart_items as $item){
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price,
            ]);
            $product=Product::where('id',$item->prod_id)->first();
            $product->qty= $product->qty - $item->prod_qty;
            $product->update();
        }
        $cart_items=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cart_items);
        return redirect('/')->with('status','Order placed successfully');
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
