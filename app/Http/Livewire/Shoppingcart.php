<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Products;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

use function Symfony\Component\Translation\t;

class Shoppingcart extends Component
{

    public $products;
    public $countProduct;
    public $couponCode;
    public $couponAmount;

    public function mount()
    {
        foreach (Cart::instance('shopping')->content() as $items) {
            if ($items->options->coupon){
                $activeCoupons = Coupon::where('code', $items->options->coupon)->first();
                $this->couponAmount = number_format( Cart::instance('shopping')->total() - $activeCoupons->amount, 2);
            }else{
                $this->couponAmount =  Cart::instance('shopping')->total();
            }
        }
    }

    public function removeProduct($rowId)
    {
        Cart::instance('shopping')->remove($rowId);
        $this->emit('addToCart');
    }

    public function applyCoupon()
    {
        $this->validate([
            'couponCode' => 'required',
        ]);

        $activeCoupons = Coupon::where('code', $this->couponCode)->first();

        if ($activeCoupons) {
            foreach (Cart::instance('shopping')->content() as $items) {
                $product = Cart::instance('shopping')->get($items->rowId);
                $options = $product->options->merge(['coupon' => $this->couponCode]);
                Cart::instance('shopping')->update($product->rowId, ['options' => $options]);
            }
            $this->couponAmount =  Cart::instance('shopping')->total() - $activeCoupons->amount;
            $this->reset();
            session()->flash('couponMessage', 'Coupon applied successfully!!!');
            return redirect('/cart');
        } else {
            session()->flash('couponError', 'Wrong coupon code');
        }
    }

    public function increment($rowId, $id)
    {
        foreach (Cart::instance('shopping')->content() as $items) {
            $product = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($id);
            if ($product->category == 'Brands') {
                if ($items->qty < $product->product_brands->quantity1_sm && $this->productSize == 'Small' && $this->productColor == $product->product_brands->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity1_md && $this->productSize == 'Medium' && $this->productColor == $product->product_brands->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity1_lg && $this->productSize == 'Large' && $this->productColor == $product->product_brands->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity1_xl && $this->productSize == 'Xtra Large' && $this->productColor == $product->product_brands->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity1_xxl && $this->productSize == 'X Xtra Large' && $this->productColor == $product->product_brands->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity2_sm && $this->productSize == 'Small' && $this->productColor == $product->product_brands->color2) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity2_md && $this->productSize == 'Medium' && $this->productColor == $product->product_brands->color2) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity2_lg && $this->productSize == 'Large' && $this->productColor == $product->product_brands->color2) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity2_xl && $this->productSize == 'Xtra Large' && $this->productColor == $product->product_brands->color2) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity2_xxl && $this->productSize == 'X Xtra Large' && $this->productColor == $product->product_brands->color2) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity3_sm && $this->productSize == 'Small' && $this->productColor == $product->product_brands->color3) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity3_md && $this->productSize == 'Medium' && $this->productColor == $product->product_brands->color3) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity3_lg && $this->productSize == 'Large' && $this->productColor == $product->product_brands->color3) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity3_xl && $this->productSize == 'Xtra Large' && $this->productColor == $product->product_brands->color3) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_brands->quantity3_xxl && $this->productSize == 'X Xtra Large' && $this->productColor == $product->product_brands->color3) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } else {
                    session()->flash('error', 'Product has exceeded what we have');
                }
            } elseif ($product->category == 'Accessories') {
                if ($items->qty < $product->product_accessories->total_quantity) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } else {
                    session()->flash('error', 'Product has exceeded what we have');
                }
            } elseif ($product->category == 'Thrifts') {
                if ($items->qty < $product->product_thrifts->quantity_sm) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_thrifts->quantity_md) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_thrifts->quantity_lg) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_thrifts->quantity_xl) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($items->qty < $product->product_thrifts->quantity_xxl) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } else {
                    session()->flash('error', 'Product has exceeded what we have');
                }
            } elseif ($product->category == 'Cosmetics') {
                if ($items->qty < $product->product_cosmetics->total_quantity) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } else {
                    session()->flash('error', 'Product has exceeded what we have');
                }
            } elseif ($product->category == 'Footwear') {
                if ($this->quantity < $product->product_footwear->quantity1_35 && $this->productSize == '35' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_36 && $this->productSize == '36' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_37 && $this->productSize == '37' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_38 && $this->productSize == '38' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_39 && $this->productSize == '39' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_40 && $this->productSize == '40' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_41 && $this->productSize == '41' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_42 && $this->productSize == '42' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_43 && $this->productSize == '43' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_44 && $this->productSize == '44' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_45 && $this->productSize == '45' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_46 && $this->productSize == '46' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_47 && $this->productSize == '47' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_48 && $this->productSize == '48' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity1_49 && $this->productSize == '49' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_35 && $this->productSize == '35' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_36 && $this->productSize == '36' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_37 && $this->productSize == '37' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_38 && $this->productSize == '38' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_39 && $this->productSize == '39' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_40 && $this->productSize == '40' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_41 && $this->productSize == '41' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_42 && $this->productSize == '42' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_43 && $this->productSize == '43' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_44 && $this->productSize == '44' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_45 && $this->productSize == '45' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_46 && $this->productSize == '46' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_47 && $this->productSize == '47' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_48 && $this->productSize == '48' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity2_49 && $this->productSize == '49' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_35 && $this->productSize == '35' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_36 && $this->productSize == '36' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_37 && $this->productSize == '37' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_38 && $this->productSize == '38' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_39 && $this->productSize == '39' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_40 && $this->productSize == '40' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_41 && $this->productSize == '41' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_42 && $this->productSize == '42' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_43 && $this->productSize == '43' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_44 && $this->productSize == '44' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_45 && $this->productSize == '45' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_46 && $this->productSize == '46' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_47 && $this->productSize == '47' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_48 && $this->productSize == '48' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } elseif ($this->quantity < $product->product_footwear->quantity3_49 && $this->productSize == '49' && $this->productColor == $product->product_footwear->color1) {
                    $product = Cart::instance('shopping')->get($rowId);
                    $qty = $product->qty + 1;
                    Cart::instance('shopping')->update($rowId, $qty);
                } else {
                    session()->flash('error', 'Product has exceeded what we have');
                }
            }
        }
    }

    public function decrement($rowId)
    {
        $product = Cart::instance('shopping')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('shopping')->update($rowId, $qty);
    }

    public function render()
    {
        return view('livewire.shoppingcart');
    }
}
