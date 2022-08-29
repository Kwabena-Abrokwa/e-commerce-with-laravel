<?php

namespace App\Http\Livewire;


use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class Signin extends Component
{

    public $email;
    public $password;

    public function loginUser()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', '=', $this->email)->first();
        if(!$user){
            session()->flash('error', 'User does not exist');
        }elseif($user->disabled_account == 1){
            session()->flash('error', "User's account has been disabled, kindly contact admin");
        }elseif (Auth::attempt(array('email' => $this->email, 'password' => $this->password)) && $user->disabled_account == 0) {
            session()->flash('message', "You have been successfully login.");
            return redirect('/');
        } else {
            session()->flash('error', 'Email and Password do not match.');
        }
    }

    public function googlelogin()
    {
        return Socialite::driver('google')
            ->redirect();
    }
    
    public function googleCallBack()
    {
        try{
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('email', '=', $user->email)->first();
            if ($finduser) {
                Auth::login($finduser, true);
                return redirect('/shop');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile' => $user->avatar,
                    'login_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                    'user_email_identification' => 'Google account',
                    'disabled_account'=>0,
                ]);

                Auth::login($newUser, true);

                return redirect('/');
            }
        }catch(Exception $e){
            'Something went wrong';
        }

    }


    public function facebooklogin()
    {
        return Socialite::driver('facebook')
            ->redirect();
    }
    public function facebookCallBack()
    {
        try{
            $user = Socialite::driver('facebook')->stateless()->user();
            $finduser = User::where('login_id', '=', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile' => $user->avatar,
                    'login_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                    'user_email_identification' => 'Facebook account',
                    'disabled_account'=>0,
                ]);

                Auth::login($newUser);

                return redirect('/');
            }
        }catch(Exception $e){
            'Something went wrong';
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/sign-in');
    }

    public function render()
    {
        return view('livewire.signin');
    }
}
