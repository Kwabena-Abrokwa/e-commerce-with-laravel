<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Signup extends Component
{
    public $email;
    public $username;
    public $password;
    public $password_confirmation;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'email|unique:users,email',
            'username' => 'max:15',
            'password' => 'min:6'
        ]);
    }

    public function createUser()
    {
        $this->validate([
            'email' => 'required|email|',
            'username' => 'required|',
            'password' => 'required|confirmed|',
        ]);
            $user = User::create([
                'name' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'profile' => '',
                'user_email_identification' => 'Valovov account',
                'disabled_account'=>0,
            ]);
            if($user){
                    $user = User::where('email', '=', $this->email)->first();
                    if(!$user){
                        session()->flash('error', 'User does not exist');
                    }elseif (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
                        session()->flash('message', "You have been successfully login.");
                        return redirect('/');
                    }
            }

    }

    public function render()
    {
        return view('livewire.signup');
    }
}
