<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact as ModelsContact;

class Contact extends Component
{

    public $contactFullname;
    public $contactEmail;
    public $contactPhone;
    public $contactComment;

    public function mount()
    {
        if(Auth::check()){
            $this->contactFullname = Auth::user()->name;
            $this->contactEmail = Auth::user()->email;
        }
    }

    public function contactUs()
    {
        $this->validate([
            'contactFullname' => 'required',
            'contactEmail' => 'required',
            'contactPhone' => 'required',
            'contactComment' => 'required',
        ]);


            if(Auth::check()){
                $insert = ModelsContact::create([
                    'fullname' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone_number' => $this->contactPhone,
                    'comment' => $this->contactComment,
        ]);
        }else{
            $insert = ModelsContact::create([
                'fullname' => $this->contactFullname,
                'email' => $this->contactEmail,
                'phone_number' => $this->contactPhone,
                'comment' => $this->contactComment,
    ]);
        }
        if($insert){
            session()->flash('message', 'Thank you for submission, we will get back to you shortly!');
            $this->reset();
        }
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
