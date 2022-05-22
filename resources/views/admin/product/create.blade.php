@extends('layouts.admin') @section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Product</h1>
    </div>
    <div class="card-body">
        <form class="row g-3" method="POST" action="{{ url('store_product') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label for="name" class="form-label">Category</label>
                <select class="form-select" name="cate_id" aria-label="Default select example">
                    <option value="">Select a category</option>
                    @foreach ($categories as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" />
            </div>
            <div class="col-md-4">
                <label for="small_description" class="form-label">Small Descrioption</label>
                <input type="text" class="form-control" id="small_description" name="small_description" />
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="col-md-4">
                <label for="original_price">Original Price</label>
                <input type="text" class="form-control" id="original_price" name="original_price" />
            </div>
            <div class="col-md-4">
                <label class="form-label" for="qty">Selling Price</label>
                <input type="text" class="form-control" id="selling_price" name="selling_price" />
            </div>
            <div class="col-md-4">
                <label class="form-label" for="taxt"> Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" />
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    
                    <input class="form-check-input" type="checkbox" id="status" name="status">
                    <label class="form-check-label" for="status">Status</label>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="status">Taxation</label>
                <input type="text" class="form-control" id="tax" name="tax" />
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
                <textarea class="form-control" id="meta_keywords" name="meta_keywords"></textarea>
            </div>
            <div class="col-12">
                <label for="meta_descrip" class="form-label">Meta Description</label>
                <textarea class="form-control" id="meta_descrip" name="meta_description"></textarea>
            </div>


            <div class="col-md-6">
                <label class="form-label">Product Image</label>
                <input type="file" class="form-control" name="photo" onchange="loadPhoto(event)" />
            </div>
            <div class="d-grid gap-2 col-md-6">
                <div class="form-group">
                    <img id="photo" height="100" width="100" />
                </div>
            </div>

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