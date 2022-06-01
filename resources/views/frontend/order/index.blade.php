@extends('layouts.front')
@section('title',Auth::user()->name)
@section('content')

<div class="container">

    <div class="card shadow rounded">
        <div class="card-header">
            <h4>All {{ Auth::user()->name }} Order</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tracking Number</th>
                        <th scope="col">Date Order</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @php
        
                    $k=1
                    @endphp
                    @foreach ($orders as $item )

                    <tr>
                        <th scope="row">{{$k++ }}</th>
                        <td class="my-auto">{{ $item->tracking }}</td>
                        <td class="my-auto">{{ $item->created_at }}</td>
                        <td class="my-auto">${{ $item->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection