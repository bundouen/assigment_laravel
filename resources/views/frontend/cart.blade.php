@extends('layouts.front')
@section('title','Cart')


@section('content')
<div class="container my-2">
    <div class="card shadow rounded product_data">
        <div class="card-body">
            @foreach ($cartItem as $item )
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('asset/uploads/product/'.$item->products->image) }}" class="w-50" alt="">
                </div>
                <div class="col-md-5">
                    <h3>{{ $item->products->name }}</h3>
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
                <div class="col-md-2">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i></button>
                </div>
                
            </div>
            <hr>
            @endforeach
        </div>

    </div>
</div>
@endsection