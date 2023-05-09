
@extends('layouts.admin')
@section('content')
<br><br>
<br>
<div class="row">
    <div class="col-md-12">
       
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
              
                
                <h4>Edit Color </h4>
                <a href="{{ url('admin/colors')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
         
          
            <div class="card-body">
                <form action="{{ url('admin/colors/'.$color->id)}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label>Color name</label>
                        <input type="text" name="name" value="{{$color->name}}" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Color code</label>
                        <input type="text" name="code" value="{{$color->code}}" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{$color->status == '1'?'checked' :''}}> checked=hidden,Unchecked=visible

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary
                        ">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection