<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\ProductBrand;
use App\Models\ProductThrift;
use App\Models\ProductFootwear;
use App\Models\ProductCosmetics;
use App\Models\ProductAccessories;
use Illuminate\Support\Facades\Cache;

class Items extends Component
{
    public $accessories;
    public $brands;
    public $cosmetics;
    public $footwears;
    public $thrifts;
    public $unisex;
    
    public function mount()
    {
        $this->accessories = Cache::remember('quantity_accessories_now', 100, function () {
            return ProductAccessories::sum('total_quantity');
        });
        $this->brands = Cache::remember('quantity_brands_now', 100, function () {
            return ProductBrand::sum('total_quantity');
        });
        $this->cosmetics = Cache::remember('quantity_cosmestics_now', 100, function () {
            return ProductCosmetics::sum('total_quantity');
        });
        $this->footwears = Cache::remember('quantity_footwears_now', 100, function () {
            return ProductFootwear::sum('total_quantity');
        });
        $this->thrifts = Cache::remember('quantity_thrifts_now', 100, function () {
            return ProductThrift::sum('total_quantity');
        });
        $this->unisex = Cache::remember('quantity_unisex_now', 100, function () {
            return Products::where('gender_target', "Unisex Wear")->sum('total_quantity');
        });
    }

    public function render()
    {
        return view('livewire.items',[
            'accessories' => $this->accessories,
            'brands' => $this->brands,
            'cosmetics' => $this->cosmetics,
            'footwears' => $this->footwears,
            'thrifts' => $this->thrifts,
            'unisex' => $this->unisex,
        ]);
    }
}
