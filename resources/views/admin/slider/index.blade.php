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
               
                <h4>Slider </h4>
                <a href="{{ url('admin/sliders/create')}}" class="btn btn-primary text-white float-end">Add Slider</a>
               
            </div>
         
         
            <div class="card-body">
             <table class="table table-bordered table-striped">
               <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($sliders  as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->description}}</td>
                    <td>
                        <img src="{{  asset('upload/slider/'.$slider->image)  }}" style="width: 70px; height: 70px" alt="slider">
                    </td>
                    <td>{{$slider->status == '0' ? 'visible' : 'hidden'}}</td>
                    <td>
                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete')}}" class="btn btn-danger">delete</a>
                     
                    </td>
                </tr>
                @endforeach
               
               </tbody>
             </table>
            </div>
    </div>
</div>

@endsection