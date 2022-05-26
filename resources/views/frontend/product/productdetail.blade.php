@extends('layouts.front')
@section('title',$productdetail->name )

@section('content')
<div class="py-3 mb-2 shadow-sm bg-warning border-top rounded">
    <div class="container">
        <div class="mb--0">Collections / {{ $productdetail->category->name }} / {{ $productdetail->name }}</div>
    </div>
</div>

<div class="contaner">
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('asset/uploads/product/'.$productdetail->image) }}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $productdetail->name }}
                        @if ($productdetail->trending==='1')
                            <label  style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                        
                    </h2>
                    <hr>
                    <label class="me-3">Orginal Price : <s>${{ $productdetail->original_price }}</s></label>
                    <label class="fw-bold">Selling Price :${{ $productdetail->selling_price }}</label>
                    <p class="mt-3">
                        {!! $productdetail->small_description !!}
                    </p>
                    <hr>
                    @if ($productdetail->qty>0)
                        <label style="font-size: 16px;" class="badge bg-success">In stock</label>
                    @else
                        <label style="font-size: 16px;" class="badge bg-success">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control txtqty">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            <button class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                            <button class="btn btn-success me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i> </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <h2>Description</h1>
                    {!! $productdetail->description !!}
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            var inc_val=$('.txtqty').val();
            var value=parseInt(inc_val,10);
            value=isNaN(value)? 0:value;
            if(value<10){
                value++;
                $('.txtqty').val(value);
            }
        });
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            var dec_val=$('.txtqty').val();
            var value=parseInt(dec_val,10);
            value=isNaN(value)? 0:value;
            if(value>1){
                value--;
                $('.txtqty').val(value);
            }
        });
        
        
    });
</script>
    
@endsection