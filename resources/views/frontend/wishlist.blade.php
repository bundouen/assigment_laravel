@extends('layouts.front')
@section('title','Wishlist')
@section('content')
<div class="container my-2">
    <div class="card shadow rounded product_data">
        <div class="card-header">
            @if ($wishlists->count()==null)
            <h2 class="text-center">No products in Wishlist</h2>
            @else
            <h2 class="text-center">All products in Wishlist of {{ Auth::user()->name }}</h2>
            @endif
 
        </div>
        <div class="card-body">
            @php
            $total=0;
            @endphp
            @foreach ($wishlists as $item )
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset('asset/uploads/product/'.$item->products->image) }}" class="w-50" alt="">
                </div>
                <div class="col-md-4 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>$ {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if ($item->products->qty >= $item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text  decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control prod_qty">
                            <button class="input-group-text  increment-btn">+</button>
                        </div>
                        @php $total+=$item->products->selling_price * $item->prod_qty @endphp
                    @else
                        <h6 style="color: red;">Out of stock</h6>
                    @endif
                    
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-primary btnAddToCart"><i class="fa fa-shopping-cart"></i></button>
                    <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash"></i></button>
                </div>

            </div>
            <hr>

            @endforeach
        </div>
       
    </div>
</div>
@endsection