@extends('layouts.app')
@section('title','home page')
 @section('content')
 {{-- <h4>hello home page</h4> --}}
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none d-md-flex" href="#">Categories</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{url('/collections')}}">All Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/new-arrivals')}}">New Arrivals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/featured-products')}}">Featured Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fashion</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mobiles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Smart Phones</a></li>
            <li><a class="dropdown-item" href="#">Feature Phones</a></li>
            <li><a class="dropdown-item" href="#">Mobile Covers</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
 <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
   
    <div class="carousel-inner">
        @foreach ($sliderss as $key=> $slidersitem)
        
      <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
        @if ($slidersitem->image)
          
      
        <img src="{{asset("upload/slider/".$slidersitem->image)}}" class="d-block img-responsive" alt="...">
        @endif
        <div class="carousel-caption">
        <h5>{{$slidersitem->title}}</h5>
        <p>{{$slidersitem->description}}</p>
      </div>
      </div>
      @endforeach
     
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
 </div>
  

  <div class="py-5 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h4>Welcome to our website</h4>
          <div class="underline"></div>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias at in similique soluta, non sapiente tempore nostrum aliquid consectetur, sit sed dolor. Quidem temporibus eaque nesciunt commodi? Libero, ullam corporis.</p>
        </div>

      </div>
    </div>
  </div>

  <div class="py-5 bg-white">
    <div class="container">
      <div class="row">
        @if ($trendingProducts)
        <div class="col-md-12">
          <h4>Trending products</h4>
          <div class="underline"></div>
      
<div class="owl-carousel custom-pp trending-product">
  @foreach ($trendingProducts as $productItem)
  <div class="product-card ">
    <div class="product-card-img">
        {{-- @if ($productItem->quantity>0)
        <label class="stock bg-success">In Stock</label>
        @else
        <label class="stock bg-success">Out of Stock</label>
        @endif --}}
        {{-- @if ($productItem->productImages->count()>0)
            
        @endif --}}
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

@endforeach
{{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">">
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
</div> --}}
</div>
        
        </div>
        @else
    
        <div class="col-md-12">
            <div class="p-2">
                <h4>No Products</h4>
            </div>
        </div>
        @endif
  
  
          

      </div>
    </div>
  </div>

 @endsection
  @section('script')
  <script>
    var owl = $('.custom-pp');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
//   $('.custom-pp').owlCarousel({
//     loop:true,
//     margin:10,
//     nav:true,

//     responsive:{
//         0:{
//             items:1
//         },
//         600:{
//             items:3
//         },
//         1000:{
//             items:5
//         }
//     }
// })
</script>

  @endsection