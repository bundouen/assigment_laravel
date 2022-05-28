@extends('layouts.front')
@section('title','Cart')


@section('content')
<div class="container my-2">
    <div class="card shadow rounded product_data">
        <div class="card-header">
            @if ($cartItem->count()==null)
                <h2 class="text-center">No Cart Item</h2>
            @else
                <h2 class="text-center">All Cart Item of {{ Auth::user()->name }}</h2>
            @endif

        </div>
        <div class="card-body">
            @php
                $total=0;
            @endphp
            @foreach ($cartItem as $item )
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('asset/uploads/product/'.$item->products->image) }}" class="w-50" alt="">
                </div>
                <div class="col-md-4">
                    <h6>{{ $item->products->name }}</h6>
                   
                </div>
                <div class="col-md-2">
                    <h6>$ {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" value="{{ $item->prod_qty }}" class="form-control prod_qty">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i></button>
                </div>

            </div>
            <hr>
            @php
                $total+=$item->products->selling_price * $item->prod_qty
            @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h3>Total Price=$ {{ $total }}
                <button class="btn btn-primary btn-checkout float-end" style="font-size: 22px">Check Out</button>
            </h3>
        </div>
    </div>
</div>
@endsection