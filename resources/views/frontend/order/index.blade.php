@extends('layouts.front')
@section('title',Auth::user()->name)
@section('content')

<div class="container">
    <div class="card shadow rounded">

        @php

        $k=1
        @endphp
        <div class="text-center">
            <div class="card-header">
                <h4>All {{ Auth::user()->name }} Order</h4>
                <hr>
                <div class="row">
                    <div class="col-md-1">
                        <h4>Status</h4>
                    </div>
                    <div class="col-md-2 ">
                        <h4>Tracking Number</h4>
                    </div>
                    <div class="col-md-2 ">
                        <h4>Order Date</h4>
                    </div>
                    <div class="col-md-2 ">
                        <h4>Total</h4>
                    </div>
                    <div class="col-md-5 ">
                        <h4>Order Detail</h4>
                    </div>
                </div>
            </div>
            @foreach ($orders as $item )
            @php
            $k++
            @endphp
            <div class="row my-2">
                <div class="col-md-1">{{$item->status==0?"Pending":"Completed" }}</div>
                <div class="col-md-2">{{ $item->tracking }}</div>
                <div class="col-md-2">{{ $item->created_at->toDateTimeString() }}</div>
                <div class="col-md-2">{{ $item->total }}</div>
                <div class="col-md-5">
                    <td class="my-auto order-details ">
                        <p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#order_items{{ $k }}"
                                role="button" aria-expanded="false" aria-controls="order_items">
                                Order Items
                            </a>
                        </p>
                        <div class="row ">
                            <div class="col">
                                <div class="collapse " id="order_items{{ $k }}">
                                    <div class="card shadow rounded">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Image</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                    $total=0;
                                                    @endphp
                                                    @foreach ($item->orderItems as $order_item )
                                                    <tr>

                                                        <td class="my-auto">{{ $order_item->products->name }}</td>
                                                        <td class="my-auto">{{ $order_item->products->selling_price
                                                            }}</td>
                                                        <td class="my-auto">{{ $order_item->qty }}</td>

                                                        <td class="my-auto"><img src="{{ "
                                                                asset/uploads/product/".$order_item->products->image
                                                            }}" width='50px'></td>

                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                                <tfoot style="font-size: 12px; color:dimgray;">
                                                    <td class="my-auto">{{ $item->phone }}</td>
                                                    <td class="my-auto">{{ $item->address1}}</td>
                                                    <td class="my-auto">{{ $item->address2 }}</td>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </div>
            </div>
            <hr>

            @endforeach
        </div>
    </div>
</div>

@endsection