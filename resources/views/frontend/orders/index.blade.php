@extends('layouts.app')
@section('title','My order')
 @section('content')
 <div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">My orders</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Order Id</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment mode</th>
                                <th>Order date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->tracking_no}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->payment_mode}}</td>
                                        <td>{{$item->created_at->format('d-m-y') }}</td>
                                        <td>{{$item->status_message}}</td>
                                        <td>
                                            <a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary">view</a>
                                           
                                            </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7">No order</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

 </div>

 @endsection