@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
    @if (session('message'))
    <h2>{{ session('message') }}</h2>
    @endif
    <div class="me-md-3 me-xl-5">
        <h2>Dashboard</h2>
        <p>Your analytic Dashboar template</p>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Total Order</label>
                <a href="{{url('admin/orders')}}" class="text-white">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-info text-white mb-3">
                <label for="">Total Product</label>
                <a href="{{url('admin/products')}}" class="text-white">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-danger text-white mb-3">
                <label for="">Total Category</label>
                <a href="{{url('admin/category')}}" class="text-white">View</a>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection