@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">
    <h1>Edit/Update Category</h1>
  </div>
  <div class="card-body">

    <form class="row g-3" method="POST" action="{{ url('update_category/'.$category->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="col-md-6">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" value="{{ $category->name }}"  id="name" name="name">
      </div>
      <div class="col-md-6">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" value="{{ $category->slug }}" id="slug" name="slug">
      </div>
      <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
      </div>
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox"  id="status" name="status" {{ $category->status=='1'? 'checked':'' }}>
          <label class="form-check-label" for="status">
            Status
          </label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="popular" name="popular" {{ $category->popular=='1'? 'checked':'' }}>
          <label class="form-check-label" for="popular">
            Popular
          </label>
        </div>
      </div>
      <div class="col-12">
        <label for="meta_title" class="form-label">Meta Title</label>
        <textarea class="form-control" id="meta_title" name="meta_title">{{ $category->meta_title }}</textarea>
      </div>
      <div class="col-12">
        <label for="meta_descrip" class="form-label">Meta Description</label>
        <textarea class="form-control" id="meta_descrip" name="meta_descrip">{{ $category->meta_descrip }}</textarea>
      </div>
      <div class="col-12">
        <label for="meta_keyword" class="form-label">Meta Keywords</label>
        <textarea class="form-control" id="meta_keywords" name="meta_keywords">{{ $category->meta_keywords }}</textarea>
      </div>

      <div class="col-md-6">
        <input type="file" class="form-control" name="photo" onchange="loadPhoto(event)">
      </div>
      @if ($category->image)
          
        <div class="d-grid gap-2 col-md-6">
            <div class="form-group">
            <img id="photo" src="{{ asset('asset/uploads/category/'.$category->image) }}" height="100" width="100" />
            </div>
        </div>
        @endif
      <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="fa fa-pen"></i> Update</button>
      </div>
    </form>
  </div>

</div>
<script>
  function loadPhoto(event) {
    var reader = new FileReader();
    reader.onload = ()=> {
      var output = document.getElementById('photo');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

@endsection