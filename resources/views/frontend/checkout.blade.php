@extends('layouts.front')
@section('title')
Checkout
@endsection
@section('content')
<div class="container">
    <form action="{{ url('place_order') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-7 mb-3">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h4>Basic Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="fname" placeholder="Firs Name" name="fname"
                                    value="{{isset($reciever)?$reciever->fname:Auth::user()->name}}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname"
                                    value="{{ isset($reciever)?$reciever->lname:'' }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email"
                                    value="{{isset($reciever)? $reciever->email:Auth::user()->email }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Phone number" name="phone"
                                    value="{{isset($reciever)? $reciever->phone:'' }}" />
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Address 1" name="address1"
                                    value="{{isset($reciever)? $reciever->address1:'' }}" />
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Address 2" name="address2"
                                    value="{{ isset($reciever)?$reciever->address2:'' }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="City" name="city"
                                    value="{{ isset($reciever)?$reciever->address2:'' }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Tracking" name="tracking"
                                    value="{{isset($reciever)? $reciever->tracking:'' }}" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h4>Order Detail</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $total=0;
                                @endphp
                                @foreach ($cart_items as $item )

                                <tr>
                                    <th scope="row">{{$k++ }}</th>
                                    <td class="my-auto">{{ $item->products->name }}</td>
                                    <td class="my-auto">{{ $item->products->selling_price }}</td>
                                    <td class="my-auto">{{ $item->prod_qty }}</td>
                                    <td class="my-auto">{{ $item->products->selling_price * $item->prod_qty }}</td>
                                </tr>
                                @php
                                $total +=$item->products->selling_price * $item->prod_qty
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        @if ($total>0)
                            <button type="submit" class="btn btn-primary">Place Order</button>
                            <input type="hidden" value="{{ $total }}" name="total">
                            <h4 class="float-end">Total:$ {{ $total }}</h4>
                        @else
                        <a href="{{ url('/') }}" class="btn btn-primary">Back to add cart</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection