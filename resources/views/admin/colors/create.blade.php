{{-- @extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Colors </h4>
                <br>
                <br>
                <br>
                <a href="{{ url('admin/colors/create')}}" class="btn btn-primary text-white float-end">Add colors</a>
               
            </div>
         
            </div>
            <div class="card-body">
            </div>
    </div>
</div> --}}
@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
       
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
              
                
                <h4>Add Color </h4>
                <a href="{{ url('admin/colors')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
         
          
            <div class="card-body">
                <form action="{{ url('admin/colors/create')}}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label>Color name</label>
                        <input type="text" name="name" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Color code</label>
                        <input type="text" name="code" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status"> checked=hidden,Unchecked=visible

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary
                        ">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection