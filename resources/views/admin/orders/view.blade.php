@extends('layouts.admin')
@section('title','My order details')
 @section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success mb-3">{{session('message')}}</div>
                @endif
                <div class="card">
                <div class="shadow bg-white p-3">
                    <h4>
                        <i class="fa fa-shopping-cart"></i>My Order Details
                        <a href="{{url('admin/orders')}}" class="btn btn-danger btn-sm">back</a>
                        <a href="{{url('admin/invoice/'.$order->id).'/generate'}}" class="btn btn-primary btn-sm">
                            Download In voice
                        </a>
                        <a href="{{url('admin/invoice/'.$order->id)}}" target="_blank" class="btn btn-warning btn-sm">
                            View voice
                        </a>
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

                <div class="card">
                    <div class="card-body">
                        <h4>Order Proccess(Order status Updates)</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{ url('admin/orders/'.$order->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Update Your Order status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select order Status</option>
                                        <option value="in progress" {{Request::get('status')=='in progress' ? 'selected':''}}>In Progress</option>
                                        <option value="completed" {{Request::get('status')=='completed' ? 'selected':''}}>Completed</option>
                                        <option value="pending" {{Request::get('status')=='pending' ? 'selected':''}}>Pending</option>
                                        <option value="cancelled" {{Request::get('status')=='cancelled' ? 'selected':''}}>Cancelled</option>
                                        <option value="out-for-delivery" {{Request::get('status')=='out-for-delivery' ? 'selected':''}}>Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <br>
                                <h4 class="mt-3">Current Order status: <span class="text-uppercase">{{ $order->status_message}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

 

 @endsection