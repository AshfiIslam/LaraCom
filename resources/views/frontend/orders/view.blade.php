@extends('layouts.app')
@section('title','My order details')
 @section('content')
 <div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4>
                        <i class="fa fa-shopping-cart"></i>My Order Details
                        <a href="" class="btn btn-danger btn-sm">back</a>
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id}}</h6>
                            <h6>Tracking Id: {{ $order->tracking_no}}</h6>
                            <h6>Order created date: {{ $order->created_at->format('d-m-t')}}</h6>
                            <h6>Payment mode: {{ $order->payment_mode}}</h6>
                            <h6 class="border p-2 text-success">
                                Order status message: <span class="text-uppercase">{{ $order->status_message}}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname}}</h6>
                            <h6>Email Id: {{ $order->email}}</h6>
                            <h6>Phone: {{ $order->phone}}</h6>
                            <h6>Address: {{ $order->address}}</h6>
                            <h6>Pin code: {{ $order->pincode}}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Item Id</th>
                                {{-- <th>Image</th> --}}
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="100">{{$orderItem->id}}</td>
                                        <td>{{$orderItem->product_id}}</td>
                                        <td>{{$orderItem->price}}</td>
                                        <td>{{$orderItem->quantity}}</td>
                                        <td>{{$orderItem->quantity * $orderItem->price}}</td>
                                       
                                    </tr>

                             
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

 </div>

 @endsection