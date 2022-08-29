<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class NavWishlist extends Component
{
    public $countCart;

    protected $listeners = ['addToWishlist'];

    public function mount()
    {
        $this->countCart = Cart::instance('wishlist')->content()->count();
    }

    public function addToWishlist()
    {
        $this->countCart = Cart::instance('wishlist')->content()->count();
    }

    public function render()
    {
        return view('livewire.components.nav-wishlist');
    }
}
