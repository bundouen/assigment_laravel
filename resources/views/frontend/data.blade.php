<div class="row">
    @foreach ($products as $item )
    <div class="col-md-3 mb-3">
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
            {{-- <div class="p-3 btn_add_cart text-center ">
                <input type="hidden" name="prod_id" value="{{ $item->id }}">
                <input type="hidden" name="prod_qty" value="{{ 1 }}">
                <button class="btn text-uppercase float-start btnAddToCart" style="color: blue;"><i
                        class="fa fa-shopping-cart mx-3"></i> Add to
                    cart
                </button>
            </div> --}}
        </div>

    </div>
    @endforeach
</div>