@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>All Users</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role as</th>
                  </tr>
                </thead>
               
                <tbody>
                    @php
                        $k=1;
                    @endphp
                    @foreach ($users as $item )
                        <tr class="text-center">
                          <td scope="row">{{$k++ }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->role_as==0?'Customer':'Admin' }}</td>
                          
                        </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    
    </div>
</div>
    
@endsection