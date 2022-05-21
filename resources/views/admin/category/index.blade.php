@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>All Category</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
           
            <tbody>
                @foreach ($categories as $cat )
              <tr>
                <th scope="row">{{ $cat->id }}</th>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->description }}</td>
                <td><img src="{{'asset/uploads/category/'.$cat->image  }}" class="cl_image" alt=""></td>
                <td>
                    <a href="{{ url('edit_category/'. $cat->id) }}" class="btn btn-primary"> <i class="fa fa-pen"></i></a>
                    <a href="{{ url('delete_category/'.$cat->id) }}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

</div>
    
@endsection