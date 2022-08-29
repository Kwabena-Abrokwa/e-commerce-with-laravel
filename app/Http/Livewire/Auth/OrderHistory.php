<?php

namespace App\Http\Livewire\Auth;

use App\Models\Checkout;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderHistory extends Component
{
    public $checkoutInfo;
    public function mount()
    {
        $orders = Order::where('users_id', Auth::user()->id)->get();
        foreach($orders as $order)
        {
            $this->checkoutInfo = Checkout::with('destinations')->find($order->checkouts_id);
           // dd($this->checkoutInfo);
        }
    }
    
    public function render()
    {
        return view('livewire.auth.order-history',[
            'orders'=> Order::with('products')->where('users_id', Auth::user()->id)->latest()->paginate(10),
            'orderCount' => Order::where('users_id', Auth::user()->id)->count(),
        ]);
    }
}
