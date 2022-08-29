<?php

namespace App\Http\Livewire\Auth;

use App\Models\Order;
use App\Models\Checkout;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Account extends Component
{
    public $username;
    public $password;
    public $checkoutInfo;
    public $password_confirmation;
    public $disablePassword;

    public function mount()
    {
        $orders = Order::where('users_id', Auth::user()->id)->get();
        if ($orders) {
            foreach ($orders as $order) {
                $this->checkoutInfo = Checkout::with('destinations')->find($order->checkouts_id);
                // dd($this->checkoutInfo);
            }
        }
        $this->username = Auth::user()->name;
    }

    public function updateDetails()
    {
        if ($this->username != Auth::user()->name && $this->password != '') {
            $this->validate([
                'password' => 'required|confirmed',
            ]);
            $updated = User::where('id', Auth::user()->id)->update([
                'name' => $this->username,
                'password' => $this->password,
            ]);
            if ($updated) {
                session()->flash('message', 'Username and password has been updated successfully');
            }
            session()->flash('message', 'Username and password has been updated successfully');
        } elseif ($this->password != '') {
            $this->validate([
                'password' => 'required|confirmed',
            ]);
            $updated = User::where('id', Auth::user()->id)->update([
                'password' => $this->password,
            ]);
            if ($updated) {
                session()->flash('message', 'Password has been updated successfully');
            }
        } elseif ($this->username != Auth::user()->name) {
            $updated = User::where('id', Auth::user()->id)->update([
                'name' => $this->username,
            ]);
            if ($updated) {
                session()->flash('message', 'Username has been updated successfully');
            }
        } else {
            session()->flash('message', 'Everything is up-to-date');
        }
    }

    public function disableAccount()
    {
        $this->validate([
            'disablePassword' => 'required',
        ]);

        $user = User::where('email', '=', Auth::user()->email)->first();
        if (Auth::attempt(array('email' => Auth::user()->email, 'password' => $this->disablePassword)) && $user->disabled_account == 0) {
            $updated = User::where('id', Auth::user()->id)->update([
                'disabled_account' => 1,
            ]);
            if ($updated) {
                session()->flash('disableMessage', "This account has been disabled successfully.");
                return redirect('/logout');
            }
        } else {
            session()->flash('disableError', 'You entered a wrong password. Please try again');
        }
    }

    public function render()
    {
        return view('livewire.auth.account', [
            'orders' => Order::with('products')->where('users_id', Auth::user()->id)->latest()->paginate(5),
            'orderCount' => Order::where('users_id', Auth::user()->id)->count(),
        ]);
    }
}
