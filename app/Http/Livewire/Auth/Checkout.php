<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Checkout as ModelsCheckout;
use App\Models\Destinations;

class Checkout extends Component
{
    public $usersInforExist;
    public $fullname;
    public $country;
    public $region;
    public $location;
    public $tel;
    public $destinationid;


    

    public $addNewLocation = false;

    public function mount()
    {
            $this->usersInforExist = ModelsCheckout::with('destinations')->where('users_id', '=', Auth::user()->id )->where('status', 0)->latest()->get();
    }

    public function userInformation($id)
    {
        $this->validate([
            'fullname' => 'required',
            'country' => 'required',
            'region' => 'required',
            'location' => 'required',
            'tel' => 'required',
        ]);

        $customerInfo = ModelsCheckout::create([
            'users_id' => Auth::user()->id,
            'fullname' => $this->fullname,
            'destinations_id' => $id,
            'phone' => $this->tel,
            'status' => 0,
        ]);

        if ($customerInfo) {
            return redirect('/checkout');
        }
    }

    public function addInformation($id)
    {

        $this->validate([
            'fullname' => 'required',
            'country' => 'required',
            'region' => 'required',
            'location' => 'required',
            'tel' => 'required',
        ]);

        $customerInfo = ModelsCheckout::create([
            'users_id' => Auth::user()->id,
            'fullname' => $this->fullname,
            'destinations_id' => $id,
            'phone' => $this->tel,
            'status' => 0,
        ]);

        if ($customerInfo) {
            return redirect('/checkout');
        }
    }

    public function addNewLocations()
    {
        $this->addNewLocation = true;
    }

    public function deleteLocation($id)
    {
        $userLocation = ModelsCheckout::find($id);
        if($userLocation){
            $userLocation->update([
                'status' => 1,
            ]);
            return redirect('/checkout');
        }
    }

    public function confirmLocation($id)
    {
        $getCheckout = ModelsCheckout::with('destinations')->where('id', '=', $id)->get();
        foreach (Cart::instance('shopping')->content() as $products) {
            foreach($getCheckout as $gotCheckout){
                $options = $products->options->merge(['checkout_id' => $gotCheckout->id, 'destination_fee' => $gotCheckout->destinations->price]);
                Cart::instance('shopping')->update($products->rowId, ['options' => $options]);
            }
        }
        return redirect('/orders');
    }
    public function render()
    {
        return view('livewire.auth.checkout',[
            'getDestinationDetails' => Destinations::get()->unique('region'),
            'findDestination' => Destinations::where('region', '=', $this->region)->get(),
            'findPriceDestination' => Destinations::where('location', '=', $this->location)->get() 
        ]);
    }
}
