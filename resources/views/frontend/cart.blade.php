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
                <div class="col-md-2 my-auto">
                    <img src="{{ asset('asset/uploads/product/'.$item->products->image) }}" class="w-50" alt="">
                </div>
                <div class="col-md-4 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>$ {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if ($item->products->qty >= $item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text change_qty decrement-btn">-</button>
                            <input type="text" name="quantity" value="{{ $item->prod_qty }}" class="form-control prod_qty">
                            <button class="input-group-text change_qty increment-btn">+</button>
                        </div>
                        @php $total+=$item->products->selling_price * $item->prod_qty @endphp
                    @else
                        <h6 style="color: red;">Out of stock</h6>
                    @endif
                </div>
                <div class="col-md-1 my-auto">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i></button>
                </div>

            </div>
            <hr>

            @endforeach
        </div>
        <div class="card-footer">
            <h3>Total Price=$ {{ $total }}
                @if ($cartItem->count()>0)
                    <a href="{{ url('checkout') }}" class="btn btn-primary btn-checkout float-end"
                    style="font-size: 70%">Checkout <i class='fas fa-cart-arrow-down' style='font-size:22px;'></i></a>
                @else
                <a href="{{ url('/') }}" class="btn btn-primary btn-checkout float-end"
                style="font-size: 70%">Continue to add cart <i class='fas fa-shopping-cart' style='font-size:22px;'></i></a>
                @endif
                
            </h3>
        </div>
    </div>
</div>
@endsection