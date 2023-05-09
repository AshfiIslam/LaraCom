@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit product </h4>
                <a href="{{ url('admin/products')}}" class="btn btn-primary text-white float-end">Back</a>
               
            </div>
            <div class="card-body">
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT ')
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
                        <button class="nav-link" id="color-tab" data-toggle="tab" data-target="#color" type="button" role="tab" >Product Color</button>
                      </li>
                  </ul>

                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}" {{$category->id == $product->category_id ? 'selected' :''}}>
                                        {{$category->name}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" value="{{ $product->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" value="{{ $product->slug}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id}} {{$brand->name == $product->brand ? 'selected' :''}}">
                                        {{$brand->name}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Small Description</label>
                            <textarea name="small_descreption" class="form-control" rows="4">{{ $product->small_descreption}}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="descreption" class="form-control" rows="4">{{ $product->descreption}}</textarea>
                        </div>
                    </div>
                   
                    <div class="tab-pane fade" id="seotag-tab" role="tabpanel" aria-labelledby="seotag-tab">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title"  value="{{ $product->meta_title}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Original Price</label>
                                    <input type="text" name="original_price" value="{{ $product->original_price}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Selling Price</label>
                                    <input type="text" name="selling_price" value="{{ $product->selling_price}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" value="{{ $product->quantity}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending" {{$product->trending == '1'?'checked' :''}} style="width:50px;height:50px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Featured</label>
                                    <input type="checkbox" name="featured" {{$product->trending == '1'?'checked' :''}} style="width:50px;height:50px;">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" {{$product->status == '1'?'checked' :''}} style="width:50px;height:50px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image">
                            <div class="mb-3">
                                <label>Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if($product->productImages)
                                <div class="col-md-2">
                                @foreach ($product->productImages as $image)
                                <img src="{{asset($image->image)}}" style="width:50px;height:50px;" class="me-4" alt="" >
                                <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                @endforeach
                                </div>
                                @else
                                <h5>No image</h5>
                                @endif
                            </div>
                    </div>
                    <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color">
                        <div class="mb-3">
                            <h4>Add product color</h4>
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
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Color name</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $prodColor)
                                        
                                   
                                    <tr class="prod-color-tr">
                                        <td>
                                            @if ($prodColor->color)
                                            {{$prodColor->color->name}}
                                            @else
                                            No color
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <div class="input-group mb-3" style="width: 150px">
                                                <input type="text" value="{{$prodColor->quantity}}" class="productColorQuantity form-control form-control-sm">
                                                <button type="button" value="{{$prodColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm">Update</button>

                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$prodColor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
        </div>
    </div>
</div>
    </div>




@endsection
 
@section('scripts')
<script>
    $(document).ready(function (){
//         $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
        $(document).on('click','.updateProductColorBtn',function(){
            var product_id = "{{$product->id}}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            // alert(prod_color_id);

            if(qty <=0)
            {
                alert('quantity is required');
                return false;
            }
            var data = {
                'product_id':product_id,
                'qty':qty
            };
            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+prod_color_id,
                data:data,
                success:function(response){
                    alert (response.message);
                }
            });
        })
    })
</script>


@endsection