@extends('layouts.admin')

@section('title','user list')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Users </h4>
                <a href="{{ url('admin/users/create')}}" class="btn btn-primary text-white float-end">Add Users</a>
               
            </div>
         
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if ($user->role_as == '0')
                                        <label class="badge btn-primary">User</label>

                                    @elseif ($user->role_as == '1')
                                    <label class="badge btn-warning">Admin</label>
                                    @endif
                                </td>
                               <td>
                                    <a href="{{ url('admin/users/'.$user->id.'/edit')}}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/users/'.$user->id.'/delete')}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5">No Products Available</td>
                            </tr>
                        @endforelse
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>


@endsection