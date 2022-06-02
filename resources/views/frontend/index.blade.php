@extends('layouts.front') @section('title','Welcome to E-Shop')
@section('content') @include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <section class="feature-product mb-5">
            <div class="row">
                <div class="py-1 shadow-sm bg-warning border-top rounded">
                    <div class="container">
                        <h2 class="pt-1 text-light">Feature Product</h2>
                    </div>
                </div>

                <div class="owl-carousel product-carousel owl-theme">
                    @foreach ($feature_product as $item )
                    <div class="item py-4">
                        <a href="{{ url('view_category/'.$item->category->id.'/'.$item->id)}}">
                            <div class="card card-product">
                                <div class="badge-original-price" id="lbl-original-price">
                                    <span><s>${{ $item->original_price }}</s></span>
                                </div>
                                <div class="product align-items-center p-2 text-center">
                                    <img src="{{ asset('asset/uploads/product/'.$item->image) }}" class="rounded mb-2"
                                        height="200" />
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="feature-category mb-5">
            <div class="row">
                <div class="py-1 shadow-sm bg-warning border-top rounded">
                    <div class="container">
                        <h2 class="pt-1 text-light">Feature Category</h2>
                    </div>
                </div>
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach ($feature_category as $cate )
                    <div class="item py-4">
                        <a href="{{ url('view_category/'.$cate->id) }}">
                            <div class="card card-product">
                                <div class="product align-items-center p-2 text-center">
                                    <img src="{{ asset('asset/uploads/category/'.$cate->image) }}" class="rounded mb-2"
                                        height="200" />
                                    <h5>{{ $cate->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="all-products">
            <div class="row">
                <div class="py-1 shadow-sm bg-warning border-top rounded">
                    <div class="container">
                        <h2 class="pt-1 text-light">All Product</h2>
                    </div>
                </div>
                <div class="col-md-12 more_products">
                    @include('frontend.data')
                </div>
            </div>
        </section>
    </div>
    {{--
    <div class="ajax-load text-center" style="display: none">
        <p><img src="{{ asset('image/Loading_icon.gif') }}" /></p>
    </div>
    --}}
</div>

{{--
<style>
    .w-5 {
        display: none;
    }

    .text-sm {
        padding: 10px;
        margin-top: 10px;
    }
</style>
--}} @endsection @section('scripts')
<script>
    $(".category-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });
</script>
<script>
    $(".product-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });
</script>
<script>
    function loadMoreData(page) {
        $.ajax({
            url: "?page=" + page,
            method: "get",

            beforeSend: function () {
                $(".ajax-load").show();
            },
        })
            .done(function (data) {
                if (data.html === "") {
                    $(".ajax-load").html("No more products");
                    return;
                }
                $(".ajax-load").hide();
                // alert(data.html.content);
                $(".more_products").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert("Sever not responding...");
            });
    }

    var page = 1;

    $(window).scroll(function () {
        if (
            $(window).scrollTop() + $(window).height() >=
            $(document).height()
        ) {
            page++;
            loadMoreData(page);
        }
    });
</script>

@endsection