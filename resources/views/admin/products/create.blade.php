@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add product </h4>
                <a href="{{ url('admin/products')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
            <div class="card-body">
                <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="seotag-taba" data-toggle="tab" data-target="#seotag-tab" type="button" role="tab" aria-controls="seotag-tab" aria-selected="false">SEO Tags</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="images-tab" data-toggle="tab" data-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Product Image</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-toggle="tab" data-target="#color" type="button" role="tab" aria-controls="image" aria-selected="false">Product Color</button>
                      </li>
                  </ul>

                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-3">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{$category->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id}}">{{$brand->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Small Description</label>
                            <textarea name="small_descreption" class="form-control" rows="4"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="descreption" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                   
                    <div class="tab-pane fade" id="seotag-tab" role="tabpanel" aria-labelledby="seotag-tab">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Original Price</label>
                                    <input type="text" name="original_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending" style="width:50px;height:50px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Featured</label>
                                    <input type="checkbox" name="featured" style="width:50px;height:50px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" style="width:50px;height:50px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image">
                            <div class="mb-3">
                                <label>Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                    </div>
                    <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="image">
                        <div class="mb-3">
                            <label>Select Color</label>
                            <hr>
                            <div class="row">
                                @forelse ($colors as $coloritem)
                                <div class="col-md-3">
                                    <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}"> 
                                    {{$coloritem->name}}
                                    <br>
                                    Quantity: <input type="number" name="colorQuantity[{{$coloritem->id}}]">

                                </div>
                                @empty
                                    <div class="col-md-12">
                                        <h1>No Colors</h1>
                                    </div>
                                @endforelse
                                
                            </div>
                           
                        </div>
                </div>
               
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
        </div>
    </div>
</div>
    </div>




@endsection