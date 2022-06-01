@extends('layouts.front')
@section('title')
{{ $category->name }}
@endsection
@section('content')
<div class="py-5">
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <div class="mb--0">Collections / {{ $category->name }}</div>
        </div>
    </div>
    <div class="container">
        {{-- <div class="row ">
            <h2 class="bg-light">{{ $category->name }}</h2>
            
                @foreach ($productbyid as $item )
                <div class="col-md-3 my-3">
                    <div class="card">
                        <a href="{{ url('view_category/'.$category->id.'/'.$item->id) }}">
                            <img src="{{ asset('asset/uploads/product/'.$item->image) }}" class="card-img-top"
                                alt="product image" />
                            <div class="card-body">
                                <div class="bg-light text-wrap title">
                                    {{ $item->name }}
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <span>$ {{ $item->selling_price }}</span>
                                    <span>$ <s>{{ $item->original_price }}</s></span>
                                </div>
                            </div>
                    </a>
                    </div>
                </div>
                @endforeach
        

        </div> --}}
        <div class="row">
            @foreach ($productbyid as $item )
            <div class="col-md-3 mb-3">
                <div class="card card-product mt-3 product_data">
                    <a href="{{ url('view_category/'.$item->category->id.'/'.$item->id)}}">
                        <div class="product align-items-center p-2 text-center">
                            <img src="{{ asset('asset/uploads/product/'.$item->image) }}" class="rounded mb-2" height="200" />
                            <h4> {{ $item->name }}</h4>
        
                            {{-- card-info --}}
                            <div class="mt-3 info">
                                <span class="small_desc d-block">
                                    {{ $item->small_description }}
                                </span>
                            </div>
                            <div class="cost mt-3 text-dark">
        
                                <div class="d-flex justify-content-around">
                                    <span>$ {{ $item->selling_price }}</span>
                                    <span>$ <s>{{ $item->original_price }}</s></span>
                                </div>
        
                            </div>
                        </div>
                    </a>
                    {{-- <div class="p-3 btn_add_cart text-center ">
                            <input type="hidden" name="prod_id" value="{{ $item->id }}">
                            <input type="hidden" name="prod_qty" value="{{ 1 }}">
                            <button class="btn text-uppercase float-start btnAddToCart" style="color: blue;"><i class="fa fa-shopping-cart mx-3"></i> Add to
                                cart
                            </button>
                    </div> --}}
                </div>
        
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection