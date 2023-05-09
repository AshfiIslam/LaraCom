<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart,$totalPrice=0;
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            $cartData->decrement('quantity');
            session()->flash('message','quantity updated');
            return false;
        }
        else
        {
            session()->flash('message','something wemt wrong');
            return false;
        }

    }
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            $cartData->increment('quantity');
            session()->flash('message','quantity updated');
            return false;
        }
        else
        {
            session()->flash('message','something wemt wrong');
            return false;
        }

    }
    // {
    // public function incrementQuantity()
    // {
    //     if( $this->quantityC < 10){
    //     $this->quantityC++;
    //     }
    // }
    // public function decrementQuantity()
    // {
    //     if( $this->quantityC > 1){
    //     $this->quantityC--;
    //     }
    // }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart:: where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        $cartRemoveData->delete();
    }
    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();

        return view('livewire.frontend.cart.cart-show',[
        'cart'=>$this->cart
        ]);
    }
}
