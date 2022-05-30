@extends('layouts.front')
@section('title')
    Category
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bg-light">All Category</h2>
                <div class="row">
                    @foreach ($feature_category as $item )
                    
                    <div class="col-md-3 my-3">
                        <a href="{{ url('view_category/'.$item->id) }}">
                            <div class="card">
                                <img src="{{ asset('asset/uploads/category/'.$item->image) }}" class="card-img-top"
                                    alt="product image" />
                                <div class="card-body">
                                    <div class="bg-light text-wrap title">
                                        {{ $item->name }}
                                    </div>
                                    {{-- <p>
                                        {{ $item->description }}
                                    </p> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
