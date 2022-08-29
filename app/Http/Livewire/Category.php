<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;


    protected $paginationTheme = 'tailwind';

    public $categoryMen;
    public $typeMen;
    public $categoryWomen;
    public $typeWomen;
    public $viewNumber = 30;
    public $orderedBy = 'name';
    public $arrange = true;
    public $productColor1 = 1;
    public $quantity = 1;
    public $preview;
    public $productSize;
    public $previewCount;
    public $productColor;
    public $findCartProduct;
    public $query;
    public $searchCategory;

    public function mount($searchCategory)
    {
        foreach (Cart::instance('shopping')->content() as $cartProducts) {
            $this->findCartProduct = Products::find($cartProducts->id);
        }
        $this->searchedCategory = $searchCategory;
    }

    public function pages()
    {
    }

    public function productPreview($id)
    {
        $this->dispatchBrowserEvent('showModal');
        $this->preview = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->where('id', '=', $id)->get();
        $this->previewCount = 1;
        $this->quantity = 1;
        $this->productColor = '';
        $this->productSize = '';
        foreach (Cart::instance('shopping')->content() as $cartProducts) {
            $this->findCartProduct = Products::find($cartProducts->id);
        }
    }

    public function addToCart($id)
    {

        $products = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($id);

        if ($products->category != 'Cosmetics') {
            $this->validate([
                'productColor' => 'required',
                'quantity' => 'required',
                'productSize' => 'required',
            ]);
        }

        switch ($products->category) {
            case 'Accessories':
                $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_accessories->image1, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                break;
            case 'Brands':
                switch ($this->productColor) {
                    case $products->product_brands->color1:
                        $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_brands->image1, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                        break;
                    case $products->product_brands->color2:
                        $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_brands->image2, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                        break;
                    case $products->product_brands->color3:
                        $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_brands->image3, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                        break;
                    default:
                        return false;
                        break;
                }
                break;
            case 'Cosmetics':
                $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_cosmetics->image1, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                break;
            case 'Footwears':
                switch ($this->productColor) {
                    case $products->product_footwear->color1:
                        $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_footwear->image1, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                        break;
                    case $products->product_footwear->color2:
                        $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_footwear->image2, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                        break;
                    case $products->product_footwear->color3:
                        $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_footwear->image3, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                        break;
                    default:
                        return false;
                        break;
                }
                break;
            case 'Thrifts':
                $added = Cart::instance('shopping')->add($products->id, $products->name, $this->quantity, $products->price, ['color' => $this->productColor, 'size' => $this->productSize, 'merchant_id' => $products->merchant_users_id, 'checkout_id' => 1, 'img' => $products->product_thrifts->image1, 'category' => $products->category, 'destination_fee' => 20, 'coupon' => '0']);
                break;
            default:
                return false;
                break;
        }
        $this->emit('addToCart');
        if ($added) {
            $this->productColor = "";
            $this->productSize = "";
            $this->quantity = 1;
        }

        $this->findCartProduct = Products::find($id);
    }

    public function increment($id)
    {
        $product = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($id);
        if ($product->category == 'Brands') {
            if ($this->productSize == '' || $this->productColor == '') {
                session()->flash('error', 'Kindly select a color and size');
            } elseif ($this->quantity < $product->product_brands->quantity1_sm && $this->productSize == 'Small' && $this->productColor == $product->product_brands->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity1_md && $this->productSize == 'Medium' && $this->productColor == $product->product_brands->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity1_lg && $this->productSize == 'Large' && $this->productColor == $product->product_brands->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity1_xl && $this->productSize == 'Xtra Large' && $this->productColor == $product->product_brands->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity1_xxl && $this->productSize == 'X Xtra Large' && $this->productColor == $product->product_brands->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity2_sm && $this->productSize == 'Small' && $this->productColor == $product->product_brands->color2) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity2_md && $this->productSize == 'Medium' && $this->productColor == $product->product_brands->color2) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity2_lg && $this->productSize == 'Large' && $this->productColor == $product->product_brands->color2) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity2_xl && $this->productSize == 'Xtra Large' && $this->productColor == $product->product_brands->color2) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity2_xxl && $this->productSize == 'X Xtra Large' && $this->productColor == $product->product_brands->color2) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity3_sm && $this->productSize == 'Small' && $this->productColor == $product->product_brands->color3) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity3_md && $this->productSize == 'Medium' && $this->productColor == $product->product_brands->color3) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity3_lg && $this->productSize == 'Large' && $this->productColor == $product->product_brands->color3) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity3_xl && $this->productSize == 'Xtra Large' && $this->productColor == $product->product_brands->color3) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_brands->quantity3_xxl && $this->productSize == 'X Xtra Large' && $this->productColor == $product->product_brands->color3) {
                $this->quantity++;
            } else {
                session()->flash('error', 'Product has exceeded what we have');
            }
        } elseif ($product->category == 'Accessories') {
            if ($this->productSize == '' || $this->productColor == '') {
                session()->flash('error', 'Kindly select a color and size');
            } elseif ($this->quantity < $product->product_accessories->total_quantity) {
                $this->quantity++;
            } else {
                session()->flash('error', 'Product has exceeded what we have');
            }
        } elseif ($product->category == 'Thrifts') {
            if ($this->productSize == '' || $this->productColor == '') {
                session()->flash('error', 'Kindly select a color and size');
            } elseif ($this->quantity < $product->product_thrifts->quantity_sm) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_thrifts->quantity_md) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_thrifts->quantity_lg) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_thrifts->quantity_xl) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_thrifts->quantity_xxl) {
                $this->quantity++;
            } else {
                session()->flash('error', 'Product has exceeded what we have');
            }
        } elseif ($product->category == 'Cosmetics') {
            if ($this->quantity < $product->product_cosmetics->total_quantity) {
                $this->quantity++;
            } else {
                session()->flash('error', 'Product has exceeded what we have');
            }
        } elseif ($product->category == 'Footwear') {
            if ($this->productSize == '' || $this->productColor == '') {
                session()->flash('error', 'Kindly select a color and size');
            } elseif ($this->quantity < $product->product_footwear->quantity1_35 && $this->productSize == '35' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_36 && $this->productSize == '36' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_37 && $this->productSize == '37' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_38 && $this->productSize == '38' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_39 && $this->productSize == '39' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_40 && $this->productSize == '40' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_41 && $this->productSize == '41' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_42 && $this->productSize == '42' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_43 && $this->productSize == '43' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_44 && $this->productSize == '44' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_45 && $this->productSize == '45' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_46 && $this->productSize == '46' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_47 && $this->productSize == '47' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_48 && $this->productSize == '48' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity1_49 && $this->productSize == '49' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_35 && $this->productSize == '35' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_36 && $this->productSize == '36' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_37 && $this->productSize == '37' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_38 && $this->productSize == '38' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_39 && $this->productSize == '39' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_40 && $this->productSize == '40' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_41 && $this->productSize == '41' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_42 && $this->productSize == '42' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_43 && $this->productSize == '43' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_44 && $this->productSize == '44' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_45 && $this->productSize == '45' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_46 && $this->productSize == '46' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_47 && $this->productSize == '47' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_48 && $this->productSize == '48' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity2_49 && $this->productSize == '49' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_35 && $this->productSize == '35' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_36 && $this->productSize == '36' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_37 && $this->productSize == '37' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_38 && $this->productSize == '38' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_39 && $this->productSize == '39' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_40 && $this->productSize == '40' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_41 && $this->productSize == '41' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_42 && $this->productSize == '42' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_43 && $this->productSize == '43' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_44 && $this->productSize == '44' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_45 && $this->productSize == '45' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_46 && $this->productSize == '46' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_47 && $this->productSize == '47' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_48 && $this->productSize == '48' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } elseif ($this->quantity < $product->product_footwear->quantity3_49 && $this->productSize == '49' && $this->productColor == $product->product_footwear->color1) {
                $this->quantity++;
            } else {
                session()->flash('error', 'Product has exceeded what we have');
            }
        }
    }

    public function decrement($id)
    {
        if ($this->quantity < 2) {
            return null;
        } else {

            $this->quantity--;
        }
    }

    public function addWishlist($id)
    {
        $products = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($id);
        $added = Cart::instance('wishlist')->add($products->id, $products->name, 1, $products->price);

        if ($added) {
            session()->flash('wishlist', 'Product added to wishlist successfully');
        }

        $this->emit('addToWishlist');
    }

    public function render()
    {
        return view('livewire.category', [
            'products' => Products::where('category', 'like', $this->searchCategory)
                ->where('total_quantity', '>', 0)
                ->orderBy($this->orderedBy, $this->arrange ? 'asc' : 'desc')
                ->paginate($this->viewNumber),
        ]);
    }
}
