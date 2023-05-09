
@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
       
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
              
                
                <h4>Add Slider </h4>
                <a href="{{ url('admin/sliders')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
         
          
            <div class="card-body">
                <form action="{{ url('admin/sliders/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$sliders->title}}" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                      <textarea name="description" id="" class="form-control" rows="3">{{$sliders->description}}</textarea>

                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" value="{{ $sliders->status == 1 ? 'checked' : 0}}"> 

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