@extends('layouts.front')
@section('title')
Welcome to E-Shop
@endsection
@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row mb-3">
            <h2 class="bg-light">Feature Products</h2>
            <div class="owl-carousel feature-carousel owl-theme my-3">
                @foreach ($feature_product as $item )
                <div class="item">
                    <div class="card card-inverse card-info">
                        <a href="{{ url('view_category/'.$item->category->id.'/'.$item->id) }}">
                            <img src="{{ asset('asset/uploads/product/'.$item->image) }}" class="card-img-top"
                                alt="product image" />
                            <div class="card-body">
                                <div class="bg-light text-wrap title">
                                    {{ $item->name }}
                                </div>
                                {{-- <h5>{{ $item->name }}</h5> --}}
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

        <div class="row">
            <h2 class="bg-light">Trending Category</h2>
            <div class="owl-carousel trending-carousel owl-theme my-3">
                @foreach ($trending_category as $cate )
                <div class="item">
                    <a href="{{ url('view_category/'.$cate->id) }}">
                        <div class="card card-inverse card-info">
                            <img src="{{ asset('asset/uploads/category/'.$cate->image) }}" class="card-img-top"
                                alt="product image" />
                            <div class="card-body">
                                <div class="bg-light text-wrap title">
                                    {{ $cate->name }}
                                </div>
                                {{-- <p>
                                    {{ $cate->description }}
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

@endsection
@section('scripts')
<script>
    $('.feature-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
<script>
    $('.trending-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection