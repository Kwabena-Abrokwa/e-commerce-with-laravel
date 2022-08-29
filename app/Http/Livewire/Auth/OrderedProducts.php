<?php

namespace App\Http\Livewire\Auth;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderedProducts extends Component
{
    public $countOrders;
    public $checkOrder;
    public $userOrder;
    public $productTracked;

    public function mount()
    {
        $this->checkOrder = Order::where('users_id', '=', Auth::user()->id)->first();
        $this->countOrders = Order::where('users_id', Auth::user()->id)->count();
    }

    public function trackProduct($id) 
    {
        $this->dispatchBrowserEvent('showModalTracker');
        $this->userOrder = Order::find($id);
        $this->productTracked = 1;
    }

    public function render()
    {
        return view('livewire.auth.ordered-products', [
            'products' => Order::with('products')->where('users_id', Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->paginate(10),
        ]);
    }
}
