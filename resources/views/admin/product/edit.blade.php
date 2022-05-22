@extends('layouts.admin') @section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit/Update Product</h1>
    </div>
    <div class="card-body">
        <form class="row g-3" method="POST" action="{{ url('update_product') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-4">
                <label for="name" class="form-label">Category</label>
                <select class="form-select" name="cate_id" aria-label="Default select example">
                    <option value="{{ $product->cate_id }}"></option>
                    @foreach ($categories as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name" />
            </div>
            <div class="col-md-4">
                <label for="small_description" class="form-label">Small Descrioption</label>
                <input type="text" class="form-control" id="small_description" value="{{ $product->small_description }}" name="small_description" />
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="col-md-4">
                <label for="original_price">Original Price</label>
                <input type="text" class="form-control" id="original_price" value="{{ $product->original_price }}" name="original_price" />
            </div>
            <div class="col-md-4">
                <label class="form-label" for="qty">Selling Price</label>
                <input type="text" class="form-control" id="selling_price" value="{{ $product->selling_price }}" name="selling_price" />
            </div>
            <div class="col-md-4">
                <label class="form-label" for="taxt"> Quantity</label>
                <input type="number" class="form-control" id="qty" value="{{ $product->qty }}" name="qty" />
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    
                    <input class="form-check-input" type="checkbox" id="status" {{ $product->status=='1'? 'checked':'' }} name="status">
                    <label class="form-check-label" for="status">Status</label>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="status">Taxation</label>
                <input type="text" class="form-control" value="{{ $product->tax }}" id="tax" name="tax" />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="status">Trending</label>
                <input type="text" class="form-control" id="trending" name="trending" />
            </div>
            <div class="col-12">
                <label for="meta_title" class="form-label">Meta Title</label>
                <textarea class="form-control" id="meta_title" name="meta_title"></textarea>
            </div>
            <div class="col-12">
                <label for="meta_keyword" class="form-label">Meta Keywords</label>
                <textarea class="form-control" id="meta_keywords" name="meta_keywords">{{ $product->meta_title }}</textarea>
            </div>
            <div class="col-12">
                <label for="meta_descrip" class="form-label">Meta Description</label>
                <textarea class="form-control" id="meta_descrip" name="meta_description">{{ $product->meta_description }}</textarea>
            </div>


            <div class="col-md-6">
                <label class="form-label">Product Image</label>
                <input type="file" class="form-control" name="photo" onchange="loadPhoto(event)" />
            </div>
           
            @if ($product->image)
            <div class="d-grid gap-2 col-md-6">
                <div class="form-group">
                <img id="photo" src="{{ asset('asset/uploads/product/'.$product->image) }}" height="100" width="100" />
                </div>
            </div>
            @endif
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    function loadPhoto(event) {
        var reader = new FileReader();
        reader.onload = () => {
            var output = document.getElementById("photo");
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection