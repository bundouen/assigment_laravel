<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roders=Order::where('status','0')->get();
        return view('admin.order.index',compact('roders'));
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

    // public function view_pdf($id){
    //     $orders=Order::where('id',$id)->where('status','0')->first();
    //     return view('admin.order.invoice-pdf', compact('orders'));
         
    // } 
    public function printpdf($id)
    {
        $orders=Order::where('id',$id)->where('status','0')->first();
        if($orders){
            $pdf = PDF::loadView('admin.order.invoice-pdf',compact('orders'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4');
            return $pdf->download("invoice_$orders->tracking.pdf");
        }
            
    
        
    }
    public function payment(Request $req){
        $id=$req->input('order_id');
        $orders=Order::where('id',$id)->where('status','0')->first();
        if($orders){
            $orders->status=1;
            $orders->update();
            return response()->json(['status'=>'Successfully']);
        }
        
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
    public function update( $id)
    {
        // $orders=Order::where('id',$id)->where('status','0')->first();
        // $pdf = PDF::loadView('admin.order.invoice-pdf',compact('orders'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4');
       
        // return $pdf->download('invoice.pdf');
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
