<div>
    <div class="py-3 py-md-5">
        <div class="container">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image)}}" class="w-100" alt="Img">
                        @else
                        no image
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}} / HP Laptop
                        </p>
                        <div>
                            <span class="selling-price">{{$product->selling_price}}</span>
                            <span class="original-price">{{$product->original_price}}</span>
                        </div>

                        <div>

                        @if ($product->productColors->count() > 0)
                            
                        @if ($product->productColors)
                            @foreach ($product->productColors as $colorItem)
                                {{-- <input type="radio" name="colorSelection" value="{{$colorItem->id}}">{{$colorItem->color->name}} --}}
                            <label class="colorSelectionLabel" style="background-color: {{ $colorItem->color->code}}"
                                wire:click="colorSelected({{$colorItem->id}})">{{ $colorItem->color->name}}</label>
                                @endforeach

                        @endif
                        @if( $this->prodColorSelectedQauntity=='outOfStock')
                        <label class="btn-sm py-1 text-white bg-danger">out of stock</label>
                        @elseif ($this->prodColorSelectedQauntity > 0)
                        <label class="btn-sm py-1 text-white bg-success">In stock</label>
                        @endif
                        @else

                        @if ($product->quantity)
                            <label class="btn-sm py-1 text-white bg-success">In stock</label>
                            @else
                            <label class="btn-sm py-1 text-white bg-danger">Out of stock</label>
                        @endif
                        @endif
                    </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa-regular fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1"> 
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>


                            <button href="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{!! $product->small_descreption}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>{{$product->descreption}}</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
