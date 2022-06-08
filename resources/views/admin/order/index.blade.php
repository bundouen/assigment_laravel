@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card shadow rounded">

        @php

        $k=1
        @endphp
        <div class="text-center">

            <div class="card-header">

                <h4>{{ count($roders)>0 ?'All Orders':'No Orders' }}</h4>

                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <h5>Name</h5>
                    </div>
                    <div class="col-md-2 ">
                        <h5>Tracking Number</h5>
                    </div>
                    <div class="col-md-2 ">
                        <h5>Order Date</h5>
                    </div>
                    <div class="col-md-1 ">
                        <h5>Total</h5>
                    </div>
                    <div class="col-md-5 ">
                        <h5>Order Detail</h5>
                    </div>
                </div>
            </div>
            @foreach ($roders as $item )
            @php
            $k++
            @endphp
            <div class="row my-2">
                <div class="col-md-2">
                    {{$item->lname." ".$item->fname}}
                    <div class="sub-title">{{ $item->phone }}</div>
                </div>
                <div class="col-md-2">{{ $item->tracking }}</div>
                <div class="col-md-2">{{ $item->created_at->toDateTimeString() }}</div>
                <div class="col-md-1">${{ $item->total }}</div>
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
                                                    <td class="my-auto">{{$item->address1}}</td>
                                                    <td class="my-auto">{{ $item->address2 }}</td>
                                                </tfoot>

                                            </table>
                                            <input type="hidden" class="order_id" value="{{ $item->id }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{ 'print-pdf/'.$item->id }}"
                                                        class="btn btn-warning  ">Export
                                                        PDF</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-success btnPayment">Paymented</button>
                                                </div>
                                            </div>
                                            {{-- <a href="{{ 'view-pdf/'.$item->id }}" class="btn btn-success">View
                                                Pdf</a> --}}
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