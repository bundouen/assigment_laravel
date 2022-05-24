@extends('layouts.front')
@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Feature Products</h2>
            <div class="owl-carousel feature-carousel owl-theme">
                @foreach ($feature_product as $item )
                <div class="item">
                    <div class="card">
                        <div class="image_product">
                            <img src="{{ asset('asset/uploads/product/'.$item->image) }}" alt="product image" />
                        </div>
                        
                        <div class="card-body">
                            <h2>{{ $item->name }}</h2>
                            <div class="d-flex justify-content-between">
                                <span>$ {{ $item->selling_price }}</span>
                                <span>$ <s>{{ $item->original_price }}</s></span>
                            </div>
                        </div>
                    </div>
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
            items:1
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