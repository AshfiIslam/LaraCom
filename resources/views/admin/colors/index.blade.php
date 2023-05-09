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
<br>
<br>
<div class="row">
   
    <div class="col-md-12">
       <br>
            <div class="alert alert-success">{{ session('message')}}</div>

        <div class="card">
            <div class="card-header">
                <br>
               
                <h4>Color </h4>
                <a href="{{ url('admin/colors/create')}}" class="btn btn-primary text-white float-end">Add Color</a>
               
            </div>
         
         
            <div class="card-body">
             <table class="table table-bordered table-striped">
               <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>color</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($colors  as $color)
                <tr>
                    <td>{{$color->id}}</td>
                    <td>{{$color->name}}</td>
                    <td>{{$color->code}}</td>
                    <td>{{$color->status ? 'hidden' : 'visible'}}</td>
                    <td>
                        <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class="btn btn-success
                            ">Edit</a>
                        <a href="{{url('admin/colors/'.$color->id.'/delete')}}" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                @endforeach
               
               </tbody>
             </table>
            </div>
    </div>
</div>

@endsection