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
        <div class="row ">
            <h2 class="bg-light">{{ $category->name }}</h2>
            
                @foreach ($productbyid as $item )
                <div class="col-md-3 my-3">
                    <div class="card card-inverse card-info">
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
        

        </div>
    </div>
</div>
@endsection