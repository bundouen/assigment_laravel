@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>All Product</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Original Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $prod )
                <tr>
                    <th scope="row">{{ $k++ }}</th>
                    <td>{{ $prod->name }}</td>
                    <td>{{ $prod->original_price }}</td>
                    <td>{{ $prod->selling_price }}</td>
                    <td>{{ $prod->qty }}</td>
                    <td><img src="{{'asset/uploads/product/'.$prod->image  }}" class="cl_image" alt=""></td>
                    <td>
                        <a href="{{ url('edit_product/'. $prod->id) }}" class="btn btn-primary"> <i
                                class="fa fa-pen"></i></a>
                        <a href="{{ url('delete_product/'.$prod->id) }}" class="btn btn-danger delete-confirm"> <i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<script src="admin/js/delete-confirm.js"></script>

@endsection