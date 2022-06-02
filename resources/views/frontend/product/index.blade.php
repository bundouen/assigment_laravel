@extends('layouts.front')
@section('title')
{{ $category->name }}
@endsection
@section('content')
<div class="py-1">
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h3 class="mb-0 text-light ">Collections / {{ $category->name }}</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($productbyid as $item )
            <div class="col-md-3 mb-3">
                 {{-- <div class="card card-product mt-3 product_data">
                    <a href="{{ url('view_category/'.$item->category->id.'/'.$item->id)}}">
                        <div class="product align-items-center p-2 text-center">
                            <img src="{{ asset('asset/uploads/product/'.$item->image) }}" class="rounded mb-2" height="200" />
                            <h4> {{ $item->name }}</h4>
        
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
                </div>  --}}
                <div class="card card-product mt-3 product_data">
                    <a href="{{ url('view_category/'.$item->category->id.'/'.$item->id)}}">
                        <div class='badge-original-price' id='lbl-original-price'>
                            <span><s>${{ $item->original_price }}</s></span>
                        </div>
                        <div class="product align-items-center p-1 text-center">
                            <img src="{{ asset('asset/uploads/product/'.$item->image) }}" class="rounded mb-2" height="200" />
                            <h5> {{ $item->name }}</h5>
        
                            {{-- card-info --}}
                            <div class="mt-3 info">
                                <span class="small_desc d-block">
                                    {{ $item->small_description }}
                                </span>
                            </div>
                            <div class="cost mt-3">       
                                <span>$ {{ $item->selling_price }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection