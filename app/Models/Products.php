<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function product_accessories()
    {
        return $this->hasOne(ProductAccessories::class);
    }
    public function product_thrifts()
    {
        return $this->hasOne(ProductThrift::class);
    }
    public function product_brands()
    {
        return $this->hasOne(ProductBrand::class);
    }
    public function product_cosmetics()
    {
        return $this->hasOne(ProductCosmetics::class);
    }
    public function product_footwear()
    {
        return $this->hasOne(ProductFootwear::class);
    }
}
