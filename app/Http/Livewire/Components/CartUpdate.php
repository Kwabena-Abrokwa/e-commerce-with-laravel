<?php

namespace App\Http\Livewire\Components;

use App\Models\Products;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartUpdate extends Component
{
    public $countCart;

    protected $listeners = ['addToCart'];

    public function mount()
    {
        $this->countCart = Cart::instance('shopping')->content()->count();
    }

    public function addToCart()
    {
        $this->countCart = Cart::instance('shopping')->content()->count();
    }

    public function render()
    {
        return view('livewire.components.cart-update');
    }
}
