@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category </h4>
                <a href="{{ url('admin/category')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
            <div class="card-body">
                {{-- <form action="{{route('category.create')}}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $category->name}}" class="form-control">
                        </div>
                       
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{ $category->name}}"  class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $category->name}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/upload/category/'.$category->image)}}" width="60px" height="60px" alt="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" value="{{ $category->status == '1' ? 'checked' : ''}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $category->meta_title}}" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Key Word</label>
                            <textarea name="key_word" class="form-control">{{ $category->key_word}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control">{{ $category->meta_description}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection