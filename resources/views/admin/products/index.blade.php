@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Product </h4>
                <a href="{{ url('admin/products/create')}}" class="btn btn-primary text-white float-end">Add Products</a>
               
            </div>
         
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                @if($product->category)
                                <td>{{$product->category->id}}</td>
                                @endif
                                <td>{{$product->name}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status == '1' ? 'hidden':'visible'}}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit')}}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7">No Products Available</td>
                            </tr>
                        @endforelse
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>


@endsection