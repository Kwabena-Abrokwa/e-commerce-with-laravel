<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Products;

class Navsearch extends Component
{
    public $searches="";
    public $results;
    protected $queryString =  [ 'searches' => ['except' => '']];

    public function mount()
    {
        $this->reset();
    }

    public function render()
    {
        if(strlen($this->searches) > 1){
            $this->results = Products::where("type",'like','%'.$this->searches.'%') 
            ->orWhere('name','like','%'.$this->searches.'%')
            ->get();
        }
        return view('livewire.components.navsearch');
    }
}
