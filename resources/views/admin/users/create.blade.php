@extends('layouts.admin')

@section('title','oo')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Users </h4>
                <a href="{{ url('admin/users')}}" class="btn btn-primary text-white float-end">back</a>
               
            </div>
         
            
            <div class="card-body">
                <form action="{{ url('admin/users')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Select Role</label>
                            <select name="role_as" class="form-control">
                                <option value="">Select role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>
            </div>
    </div>
</div>
</div>
    

@endsection