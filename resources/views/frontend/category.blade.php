@extends('layouts.front')
@section('title')
    Category
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="py-1 shadow-sm bg-warning border-top rounded">
                    <div class="container">
                        <h2 class="pt-1 text-light">All Categories</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($feature_category as $item )
                    
                    <div class="col-md-3 my-3">
                        <div class="item">
                            <a href="{{ url('view_category/'.$item->id) }}">
                                <div class="card card-product">
                                    <div class="product align-items-center p-2 text-center">
                                        <img src="{{ asset('asset/uploads/category/'.$item->image) }}" class="rounded mb-2"
                                            height="200" />
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
