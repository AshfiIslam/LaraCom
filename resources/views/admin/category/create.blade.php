@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category </h4>
                <a href="{{ url('admin/category/create')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
            <div class="card-body">
                {{-- <form action="{{route('category.create')}}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ url('admin/category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                       
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Key Word</label>
                            <textarea name="key_word" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection