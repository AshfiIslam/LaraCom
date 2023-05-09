@extends('layouts.app')
@section('title','Featured products')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Featured products</h4>
                <div class="underline"></div>
            </div>

            @forelse ($featuredProducts as $productItem)
                <div class="col-md-3">
                <div class="product-card ">
                    <div class="product-card-img">
                      <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                      <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                      </a>
                  </div>
                  <div class="product-card-body">
              <p class="product-brand">{{$productItem->brand}}</p>
              <h5 class="product-name">
                 <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                  {{$productItem->name}}
                 </a>
              </h5>
              <div>
                  <span class="selling-price">{{$productItem->selling_price}}</span>
                  <span class="original-price">{{$productItem->original_price}}</span>
              </div>
              <div class="mt-2">
                  <a href="" class="btn btn1">Add To Cart</a>
                  <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                  <a href="" class="btn btn1"> View </a>
              </div>
                  </div>
          
              </div>
                </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Products</h4>
                    </div>
               @endforelse
            </div>
        </div>
    </div>
</div>


 @endsection