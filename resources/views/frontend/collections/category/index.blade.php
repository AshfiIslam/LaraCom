@extends('layouts.app')
@section('title','All Categories')
 @section('content')
 <div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse ( $categories as $categoryItem)
                {{-- @foreach ( $categories as $categoryItem ) --}}
                    
                
           
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{ url('/collections/'.$categoryItem->slug)}}">
                        <div class="category-card-img">
                            <img src="{{  asset('upload/category/'.$categoryItem->image)  }}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$categoryItem->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            {{-- @endforeach --}}
            @empty
                <div>
                    <h5>No category</h5>
                </div>
            @endforelse
            
        </div>
    </div>
</div>
 @endsection