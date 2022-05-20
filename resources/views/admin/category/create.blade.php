@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="mb-3">Create Category</h1>
        <form class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Category Name</label>
              <input type="text" class="form-control" placeholder="Category name" id="name" name="name">
            </div>
            <div class="col-md-6">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" ></textarea>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="status">
                  <label class="form-check-label" for="status">
                    Status
                  </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="popular">
                  <label class="form-check-label" for="popular">
                    Popular
                  </label>
                </div>
              </div>
            <div class="col-12">
              <label for="meta_title" class="form-label">Meta Title</label>
              <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Title">
            </div>
            <div class="col-12">
                <label for="meta_descrip" class="form-label">Meta Description</label>
                <input type="text" class="form-control" id="meta_descrip" name="meta_descrip" placeholder="Meta Description">
              </div>
            <div class="col-12">
                <label for="meta_keyword" class="form-label">Meta Keywords</label>
                <textarea  class="form-control" id="meta_keyword" name="meta_keyword" ></textarea>
            </div>
            
            
            
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        

    </div>

</div>
    
@endsection