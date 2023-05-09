<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category,$product,$prodColorSelectedQauntity, $quantityCount=1,$productColorId;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already added');
                return false;
            }
            else
            {

            
            Wishlist::create([
                'user_id' =>auth()->user()->id,
                'product_id' =>$productId
            ]);
            session()->flash('message','wishlist added successfully');
        }

        }
        else
        {
            session()->flash('message','Please Login to continue');
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor =$this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQauntity = $productColor->quantity;

        if( $this->prodColorSelectedQauntity==0)
        {
            $this->prodColorSelectedQauntity = 'outOfStock';
        }
    }
    public function incrementQuantity()
    {
        if( $this->quantityCount < 10){
        $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if( $this->quantityCount > 1){
        $this->quantityCount--;
        }

    }
    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            if($this->product->where('id',$productId)->where('status','0')->exists())
            {
                if($this->product->productColors()->count() >1)
                {
                    if($this->prodColorSelectedQauntity != NULL)
                    {
                        $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                        if($productColor->quantity >0)
                        {
                            if($productColor->quantity > $productColor->quantityCount)
                            {
                                Cart::create([
                                    'user_id' =>auth()->user()->id,
                                    'product_id'=>$productId,
                                    'product_color_id'=>$this->productColorId,
                                    'quantity'=>$this-> quantityCount

                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message','Product added to cart');
                                return false;

                            }
                            else
                            {
                                session()->flash('message','Only'.$productColor->quantity.'available');
                                return false;
                            }

                        }
                        else{
                            session()->flash('message','out of stock');
                            return false;
                        }

                    }
                    else
                    {
                        session()->flash('message','select your color');
                        return false;
                    }

                }
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                    {
                        session()->flash('message','product already added');
                        // $this->dispatchBrowserEvent('message',[
                        //         'text'=>'product already added',
                        //         'type'=>'success',
                        //         'status'=>401
                        //     ]);

                    }
                    else
                    {
                if($this->product->quantity > 0)
                    {
                    if($this->product->quantity >= $this->quantityCount)
                {
                    
                    Cart::create([
                        'user_id' =>auth()->user()->id,
                        'product_id'=>$productId,
                        'quantity'=>$this-> quantityCount

                    ]);
                    $this->emit('CartAddedUpdated');
                    session()->flash('message','Product added to cart');
                    return false;
                } 
                else
                {
                session()->flash('message','only few product available');
                return false;
                }

                    }
                else
                {
                session()->flash('message','Out of stock');
                return false;
                }

            }
                }
        }
            else{
                session()->flash('message','product does not exist');
                return false;
            }

        }
        else{
            // $this->dispatchBrowserEvent('message',[
            //     'text'=>'please login',
            //     'type'=>'info',
            //     'status'=>401
            // ]);
            session()->flash('message','please login');
                return false;
        }
    }
    public function mount($category,$product)
    {
        $this->category= $category;
        $this->product= $product;

    }
    public function render()
    {
        return view('livewire.frontend.product.view',
        [
            'category' => $this->category,
            'product' => $this->product
        ]
    );
    }
}
