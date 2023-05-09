@extends('layouts.admin')
@section('title','Admin Setting')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>

        @endif
        <form action="{{ url('/admin/settings') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
            
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Website Name</label>
                        <input type="text" name="website_name" value="{{ $setting->website_name ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Website URL</label>
                        <input type="text" name="website_url" value="{{ $setting->website_url ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Page Title</label>
                        <input type="text" name="page_title" value="{{ $setting->page_title ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea  name="meta_keyword" class="form-control">{{ $setting->meta_keyword ?? ''}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta description</label>
                        <textarea  name="meta_description" class="form-control">{{ $setting->meta_description ?? ''}}</textarea>
                    </div>
                    
                </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website- information</h3>
                </div>
            
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Address</label>
                        <textarea type="text" name="address" class="form-control">{{ $setting->address ?? ''}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">phone 1 *</label>
                        <input type="text" name="phone1" value="{{ $setting->phone1 ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">phone 2 *</label>
                        <input type="text" name="phone2" value="{{ $setting->phone2 ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email id 1*</label>
                        <input  name="email1" value="{{ $setting->email1 ?? ''}}" class="form-control"></input>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email id 2*</label>
                        <input  name="email2" value="{{ $setting->email2 ?? ''}}" class="form-control"></input>
                    </div>
                    
                </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website- Social Media</h3>
                </div>
            
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Facebook</label>
                        <input type="text" name="facebook" value="{{ $setting->facebook ?? ''}}" class="form-control"></input>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Twitter</label>
                        <input type="text" name="twitter" value="{{ $setting->twitter ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Intragram</label>
                        <input type="text" name="intragram" value="{{ $setting->intragram ?? ''}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Youtube</label>
                        <input  name="youtube" value="{{ $setting->youtube ?? ''}}" class="form-control"></input>
                    </div>
                    
                    
                </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Save settings</button>
            </div>

        </form>


    </div>
</div>

@endsection