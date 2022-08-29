<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmOrder;
use App\Mail\UsersMail;
use App\Models\Checkout;
use App\Models\Products;
use App\Models\Coupon;
use App\Models\Destinations;
use App\Models\ProductBrand;
use App\Models\ReferralAccount;
use App\Models\Transactions;
use App\Models\ProductThrift;
use App\Models\ValovovAccount;
use App\Models\DeliveryAccount;
use App\Models\MerchantAccount;
use App\Models\Order as Orders;
use App\Models\ProductFootwear;
use App\Models\ProductCosmetics;
use App\Models\ProductAccessories;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Unicodeveloper\Paystack\Facades\Paystack;

class Order extends Component
{

    public $confirmCheckout;
    public $products = [];
    public $productSize;
    public $productColor;
    public $destinationFees;
    public $transactionMethod = "Momo";
    public $total;
    public $ordered_no;
    public $activeCoupons;

    public function mount()
    {
        $this->confirmCheckout = Checkout::with('destinations')->where('users_id', '=', Auth::user()->id)->first();
        foreach (Cart::instance('shopping')->content() as $items) {
            $this->destinationFees = Checkout::findOrFail($items->options->checkout_id);
            if ($items->options->coupon) {
                $activeCoupon = Coupon::where('code', $items->options->coupon)->first();
                $this->couponAmount = number_format(Cart::instance('shopping')->total() - $activeCoupon->amount, 2);
                $this->activeCoupons = $activeCoupon->amount;
            } else {
                $this->couponAmount =  Cart::instance('shopping')->total();
                $this->activeCoupons = 0;
            }
        }
    }

    //Api request to Paystack payment end point
    public function redirectToGateway()
    {
        foreach (Cart::instance('shopping')->content() as $items) {
            $findProduct = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($items->id);

            if ($findProduct->total_quantity < 1) {
                session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                return null;
            } elseif ($findProduct->category  == 'Brands') {
                if ($items->qty  > $findProduct->product_brands->quantity1_sm && $items->size == 'Small' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_md && $items->size == 'Medium' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_lg && $items->size == 'Large' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_xl && $items->size == 'Xtra Large' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_xxl && $items->size == 'X Xtra Large' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_sm && $items->size == 'Small' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_md && $items->size == 'Medium' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_lg && $items->size == 'Large' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_xl && $items->size == 'Xtra Large' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_xxl && $items->size == 'X Xtra Large' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_sm && $items->size == 'Small' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_md && $items->size == 'Medium' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_lg && $items->size == 'Large' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_xl && $items->size == 'Xtra Large' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_xxl && $items->size == 'X Xtra Large' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Accessories') {
                if ($items->qty > $findProduct->product_accessories->total_quantity) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Thrifts') {
                if ($items->qty > $findProduct->product_thrifts->quantity_sm  && $items->size == 'Small') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_md && $items->size == 'Medium') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_lg && $items->size == 'Large') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_xl && $items->size == 'Xtra large') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_xxl && $items->size == 'X Xtra Large') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Cosmetics') {
                if ($items->qty > $findProduct->product_cosmetics->total_quantity) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Footwear') {
                if ($items->qty > $findProduct->product_footwear->quantity1_35 && $items->size == '35' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_36 && $items->size == '36' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_37 && $items->size == '37' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_38 && $items->size == '38' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_39 && $items->size == '39' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_40 && $items->size == '40' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_41 && $items->size == '41' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_42 && $items->size == '42' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_43 && $items->size == '43' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_44 && $items->size == '44' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_45 && $items->size == '45' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_46 && $items->size == '46' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_47 && $items->size == '47' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_48 && $items->size == '48' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_49 && $items->size == '49' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_35 && $items->size == '35' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_36 && $items->size == '36' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_37 && $items->size == '37' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_38 && $items->size == '38' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_39 && $items->size == '39' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_40 && $items->size == '40' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_41 && $items->size == '41' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_42 && $items->size == '42' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_43 && $items->size == '43' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_44 && $items->size == '44' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_45 && $items->size == '45' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_46 && $items->size == '46' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_47 && $items->size == '47' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_48 && $items->size == '48' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_49 && $items->size == '49' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_35 && $items->size == '35' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_36 && $items->size == '36' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_37 && $items->size == '37' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_38 && $items->size == '38' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_39 && $items->size == '39' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_40 && $items->size == '40' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_41 && $items->size == '41' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_42 && $items->size == '42' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_43 && $items->size == '43' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_44 && $items->size == '44' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_45 && $items->size == '45' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_46 && $items->size == '46' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_47 && $items->size == '47' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_48 && $items->size == '48' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_49 && $items->size == '49' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            }
        }

        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    //function to create all Orders and respective transactions
    protected function createOrderTransaction($referral, $order_id, $items_id, $items_merchant_id, $items_qty, $items_color, $items_size, $items_img, $items_subtotal,  $items_checkout_id, $transaction_id, $findProduct_merchants_price, $findProduct_valovov_price, $findProduct_referral_price, $items_coupon)
    {

        if ($items_coupon) {
            $activeCoupon = Coupon::where('code', $items_coupon)->first();
            $activeCoupons = $activeCoupon->amount;
        } else {
            $activeCoupons = 0;
        }

        $status = null;

        if ($this->transactionMethod == 'Cash') {
            $status = 0;
        } else {
            $status = 1;
        }

        if (!$referral) {
            Orders::create([
                'order_no' => $order_id,
                'users_id' => Auth::user()->id,
                'products_id' => $items_id,
                'merchant_users_id' => $items_merchant_id,
                'quantity' => $items_qty,
                'color' => $items_color,
                'size' => $items_size,
                'image' => $items_img,
                'subtotal' => $items_subtotal,
                'coupons_id' => $items_coupon,
                'checkouts_id' => $items_checkout_id,
                'status' => 0,
                'auth_id' => 0,
                'transaction_status' => $status,
                'transactions_id' => $transaction_id,
                'referral_users_id' => 0
            ]);

            Transactions::create([
                'id' => $transaction_id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'order_no' => $order_id,
                'users_id' => Auth::user()->id,
                'auth_id' => 0,
                'merchant_users_id' => $items_merchant_id,
                'merchant_amount' => $findProduct_merchants_price * $items_qty,
                'valovov_amount' => ($findProduct_valovov_price * $items_qty) - $activeCoupons,
                'total_amount' => Cart::instance('shopping')->total(),
                'status' => $status,
                'referral_users_id' => 0,
                'referral_amount' => 0,
            ]);

            MerchantAccount::create([
                'merchant_users_id' => $items_merchant_id,
                'transactions_id' => $transaction_id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'amount' => $findProduct_merchants_price * $items_qty,
                'charges' => 0,
                'balance' => $findProduct_merchants_price * $items_qty,
                'auth_id' => 0,
                'status' => $status,
            ]);

            ValovovAccount::create([
                'transactions_id' => $transaction_id,
                'merchant_users_id' =>  $items_merchant_id,
                'users_id' => Auth::user()->id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'amount' => ($findProduct_valovov_price * $items_qty) - $activeCoupons,
                'auth_id' => 0,
                'status' => $status,
            ]);
        } else {

            Orders::create([
                'order_no' => $order_id,
                'users_id' => Auth::user()->id,
                'products_id' => $items_id,
                'merchant_users_id' => $items_merchant_id,
                'quantity' => $items_qty,
                'color' => $items_color,
                'size' => $items_size,
                'image' => $items_img,
                'subtotal' => $items_subtotal,
                'coupons_id' => $items_coupon,
                'checkouts_id' => $items_checkout_id,
                'status' => $status,
                'auth_id' => 0,
                'transaction_status' => $status,
                'transactions_id' => $transaction_id,
                'referral_users_id' => $referral,
            ]);
            Transactions::create([
                'id' => $transaction_id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'order_no' => $order_id,
                'users_id' => Auth::user()->id,
                'auth_id' => 0,
                'merchant_users_id' => $items_merchant_id,
                'merchant_amount' => $findProduct_merchants_price * $items_qty,
                'valovov_amount' => ($findProduct_valovov_price * $items_qty) - ($findProduct_referral_price * $items_qty) - $activeCoupons,
                'total_amount' => Cart::instance('shopping')->total(),
                'status' => $status,
                'referral_users_id' => $referral,
                'referral_amount' =>  $findProduct_referral_price  * $items_qty,
            ]);
            MerchantAccount::create([
                'merchant_users_id' => $items_merchant_id,
                'transactions_id' => $transaction_id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'amount' => $findProduct_merchants_price * $items_qty,
                'charges' => 0,
                'balance' => $findProduct_merchants_price * $items_qty,
                'auth_id' => 0,
                'status' => $status,
            ]);
            ValovovAccount::create([
                'transactions_id' => $transaction_id,
                'merchant_users_id' => $items_merchant_id,
                'users_id' => Auth::user()->id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'amount' => ($findProduct_valovov_price * $items_qty) - ($findProduct_referral_price * $items_qty) - $activeCoupons,
                'auth_id' => 0,
                'status' => $status,
            ]);

            ReferralAccount::create([
                'referral_users_id' => $referral,
                'transactions_id' => $transaction_id,
                'transaction_type' => 'Referred Payment',
                'transaction_method' => $this->transactionMethod,
                'amount' => $findProduct_referral_price  * $items_qty,
                'charges' => 0,
                'balance' => $findProduct_referral_price  * $items_qty,
                'auth_id' => 0,
                'status' => $status,
            ]);
        }
    }

    //Callback function after payment is successful
    public function handleGatewayCallback()
    {
        $paymentDetails = paystack()->getPaymentData();

        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $order_id = $paymentDetails['data']['id']; // Getting InvoiceId I passed from the form
        //Checking to Ensure the transaction was succesful
        if ($status == "success") {
            foreach (Cart::instance('shopping')->content() as $items) {
                $findProduct = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($items->id);
                $transaction_id = '101' . random_int(0000000, 9999999);

                $getAccessories = Products::with('product_accessories')->find($items->id);
                $getProductBrands = Products::with('product_brands')->find($items->id);
                $getCosmetics = Products::with('product_cosmetics')->find($items->id);
                $getProductThrift = Products::with('product_thrifts')->find($items->id);
                $getProductFootwear = Products::with('product_footwear')->find($items->id);

                switch ($items->options->category) {
                    case 'Accessories':
                        $newTotalQuantity = $getAccessories->product_accessories->total_quantity - $items->qty;
                        $updateAccessoryTable = ProductAccessories::where('products_id', $items->id)->update([
                            'total_quantity' => $newTotalQuantity,
                        ]);
                        $updateProductTotal = $getAccessories->update([
                            'total_quantity' => $newTotalQuantity,
                        ]);
                        if ($updateAccessoryTable && $updateProductTotal) {

                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                        }
                        break;

                    case 'Brands':
                        switch ($items->options->color) {
                            case $findProduct->product_brands->color1:
                                switch ($items->options->size) {
                                    case 'Small':
                                        $newSmallQuantity = $getProductBrands->product_brands->quantity1_sm - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_sm' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'Medium':
                                        $newMediumQuantity = $getProductBrands->product_brands->quantity1_md - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_md' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'Large':
                                        $newLargeQuantity = $getProductBrands->product_brands->quantity1_lg - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_lg' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case 'Xtra Large':
                                        $newXLargeQuantity = $getProductBrands->product_brands->quantity1_xl - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_xl' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'X Xtra Large':
                                        $newXXLargeQuantity = $getProductBrands->product_brands->quantity1_xxl - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_xxl' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    default:
                                        return null;
                                        break;
                                }
                                break;
                            case $findProduct->product_brands->color2:
                                switch ($items->options->size) {
                                    case 'Small':
                                        $newSmallQuantity = $getProductBrands->product_brands->quantity2_sm - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_sm' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'Medium':
                                        $newMediumQuantity = $getProductBrands->product_brands->quantity2_md - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_md' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'Large':
                                        $newLargeQuantity = $getProductBrands->product_brands->quantity2_lg - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_lg' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case 'Xtra Large':
                                        $newXLargeQuantity = $getProductBrands->product_brands->quantity2_xl - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_xl' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'X Xtra Large':
                                        $newXXLargeQuantity = $getProductBrands->product_brands->quantity2_xxl - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_xxl' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    default:
                                        return null;
                                        break;
                                }
                                break;
                            case $findProduct->product_brands->color3:
                                switch ($items->options->size) {
                                    case 'Small':
                                        $newSmallQuantity = $getProductBrands->product_brands->quantity3_sm - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_sm' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'Medium':
                                        $newMediumQuantity = $getProductBrands->product_brands->quantity3_md - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_md' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'Large':
                                        $newLargeQuantity = $getProductBrands->product_brands->quantity3_lg - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_lg' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case 'Xtra Large':
                                        $newXLargeQuantity = $getProductBrands->product_brands->quantity3_xl - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_xl' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case 'X Xtra Large':
                                        $newXXLargeQuantity = $getProductBrands->product_brands->quantity3_xxl - $items->qty;
                                        $newTotalQuantity = $getProductBrands->product_brands->total_quantity - $items->qty;
                                        $updateBrandTable = ProductBrand::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_xxl' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductBrands->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateBrandTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    default:
                                        return null;
                                        break;
                                }
                                break;
                            default:
                                return null;
                                break;
                        }
                        break;

                    case 'Cosmetics':
                        $newTotalQuantity = $getCosmetics->product_cosmetics->total_quantity - $items->qty;
                        $updateCosmeticTable = ProductCosmetics::where('products_id', $items->id)->update([
                            'total_quantity' => $newTotalQuantity,
                        ]);
                        $updateProductTotal = $getCosmetics->update([
                            'total_quantity' => $newTotalQuantity,
                        ]);
                        if ($updateCosmeticTable && $updateProductTotal) {

                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                        }
                        break;
                    case 'Thrifts':
                        switch ($items->options->size) {
                            case 'Small':
                                $newSmallQuantity = $getProductThrift->product_thrifts->quantity_sm - $items->qty;
                                $newTotalQuantity = $getProductThrift->product_thrifts->total_quantity - $items->qty;
                                $updateThriftTable = ProductThrift::where('products_id', $items->id)
                                    ->update([
                                        'quantity_sm' => $newSmallQuantity,
                                        'total_quantity' => $newTotalQuantity,
                                    ]);
                                $updateProductTotal = $getProductThrift->update([
                                    'total_quantity' => $newTotalQuantity,
                                ]);
                                if ($updateThriftTable && $updateProductTotal) {

                                    $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                }
                                break;
                            case 'Medium':
                                $getProductThrift = Products::with('product_thrifts')->find($items->id);
                                $newMediumQuantity = $getProductThrift->product_thrifts->quantity_md - $items->qty;
                                $newTotalQuantity = $getProductThrift->product_thrifts->total_quantity - $items->qty;
                                $updateThriftTable = ProductThrift::where('products_id', $items->id)
                                    ->update([
                                        'quantity_md' => $newMediumQuantity,
                                        'total_quantity' => $newTotalQuantity,
                                    ]);
                                $updateProductTotal = $getProductThrift->update([
                                    'total_quantity' => $newTotalQuantity,
                                ]);
                                if ($updateThriftTable && $updateProductTotal) {

                                    $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                }
                                break;
                            case 'Large':
                                $getProductThrift = Products::with('product_thrifts')->find($items->id);
                                $newLargeQuantity = $getProductThrift->product_thrifts->quantity_lg - $items->qty;
                                $newTotalQuantity = $getProductThrift->product_thrifts->total_quantity - $items->qty;
                                $updateThriftTable = ProductThrift::where('products_id', $items->id)
                                    ->update([
                                        'quantity_lg' => $newLargeQuantity,
                                        'total_quantity' => $newTotalQuantity,
                                    ]);
                                $updateProductTotal = $getProductThrift->update([
                                    'total_quantity' => $newTotalQuantity,
                                ]);
                                if ($updateThriftTable && $updateProductTotal) {

                                    $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                }
                                break;

                            case 'Xtra Large':
                                $getProductThrift = Products::with('product_thrifts')->find($items->id);
                                $newXLargeQuantity = $getProductThrift->product_thrifts->quantity_xl - $items->qty;
                                $newTotalQuantity = $getProductThrift->product_thrifts->total_quantity - $items->qty;
                                $updateThriftTable = ProductThrift::where('products_id', $items->id)
                                    ->update([
                                        'quantity_xl' => $newXLargeQuantity,
                                        'total_quantity' => $newTotalQuantity,
                                    ]);
                                $updateProductTotal = $getProductThrift->update([
                                    'total_quantity' => $newTotalQuantity,
                                ]);
                                if ($updateThriftTable && $updateProductTotal) {

                                    $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                }
                                break;
                            case 'X Xtra Large':
                                $getProductThrift = Products::with('product_thrifts')->find($items->id);
                                $newXXLargeQuantity = $getProductThrift->product_thrifts->quantity_xxl - $items->qty;
                                $newTotalQuantity = $getProductThrift->product_thrifts->total_quantity - $items->qty;
                                $updateThriftTable = ProductThrift::where('products_id', $items->id)
                                    ->update([
                                        'quantity_xxl' => $newXXLargeQuantity,
                                        'total_quantity' => $newTotalQuantity,
                                    ]);
                                $updateProductTotal = $getProductThrift->update([
                                    'total_quantity' => $newTotalQuantity,
                                ]);
                                if ($updateThriftTable && $updateProductTotal) {

                                    $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                }
                                break;

                            default:
                                return null;
                                break;
                        }
                        break;
                    default:
                        return null;
                        break;
                    case 'Footwears':
                        switch ($items->options->color) {
                            case $findProduct->product_footwear->color1:
                                switch ($items->options->size) {
                                    case '35':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity1_35 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_35' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '36':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity1_36 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_36' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '37':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity1_37 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_37' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '38':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity1_38 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_38' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '39':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity1_39 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_39' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '40':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity1_40 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_40' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '41':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity1_41 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_41' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '42':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity1_42 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_42' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '43':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity1_43 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_43' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '44':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity1_44 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_44' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '45':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity1_45 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_45' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '46':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity1_46 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_46' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '47':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity1_47 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateFootwearTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_47' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateFootwearTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '48':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity1_48 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_48' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '49':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity1_49 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity1_49' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    default:
                                        return null;
                                        break;
                                }
                                break;
                            case $findProduct->product_footwear->color2:
                                switch ($items->options->size) {
                                    case '35':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity2_35 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_35' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '36':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity2_36 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_36' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '37':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity2_37 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_37' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '38':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity2_38 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_38' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '39':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity2_39 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_39' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '40':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity2_40 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_40' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '41':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity2_41 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_41' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '42':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity2_42 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_42' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '43':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity2_43 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_43' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '44':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity2_44 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_44' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '45':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity2_45 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_45' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '46':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity2_46 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_46' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '47':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity2_47 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_47' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '48':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity2_48 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_48' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '49':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity2_49 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity2_49' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    default:
                                        return null;
                                        break;
                                }
                                break;

                            case $findProduct->product_footwear->color3:
                                switch ($items->options->size) {
                                    case '35':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity3_35 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_35' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '36':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity3_36 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_36' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '37':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity3_37 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_37' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '38':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity3_38 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_38' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '39':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity3_39 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_39' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '40':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity3_40 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_40' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '41':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity3_41 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_41' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductThrift->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable  && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '42':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity3_42 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_42' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '43':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity3_43 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_43' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '44':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity3_44 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_44' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '45':
                                        $newSmallQuantity = $getProductFootwear->product_footwear->quantity3_45 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_45' => $newSmallQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '46':
                                        $newMediumQuantity = $getProductFootwear->product_footwear->quantity3_46 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_46' => $newMediumQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '47':
                                        $newLargeQuantity = $getProductFootwear->product_footwear->quantity3_47 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_47' => $newLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductThrift->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    case '48':
                                        $newXLargeQuantity = $getProductFootwear->product_footwear->quantity3_48 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_48' => $newXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;
                                    case '49':
                                        $newXXLargeQuantity = $getProductFootwear->product_footwear->quantity3_49 - $items->qty;
                                        $newTotalQuantity = $getProductFootwear->product_footwear->total_quantity - $items->qty;
                                        $updateAccessoryTable = ProductFootwear::where('products_id', $items->id)
                                            ->update([
                                                'quantity3_49' => $newXXLargeQuantity,
                                                'total_quantity' => $newTotalQuantity,
                                            ]);
                                        $updateProductTotal = $getProductFootwear->update([
                                            'total_quantity' => $newTotalQuantity,
                                        ]);
                                        if ($updateAccessoryTable && $updateProductTotal) {

                                            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
                                        }
                                        break;

                                    default:
                                        return null;
                                        break;
                                }
                                break;
                            default:
                                # code...
                                break;
                        }
                        break;
                }
            }

            $destinationFees = Checkout::findOrFail($items->options->checkout_id);
            DeliveryAccount::create([
                'users_id' => Auth::user()->id,
                'transactions_id' => $transaction_id,
                'order_no' => $order_id,
                'destinations_id' => $destinationFees->destinations->id,
                'transaction_type' => 'Customer Payment',
                'transaction_method' => $this->transactionMethod,
                'amount' => $destinationFees->destinations->price,
                'auth_id' => 0,
                'status' => 1,
            ]);

            Mail::to('valovovshop@gmail.com')->send(new ConfirmOrder());
            Mail::to(Auth::user()->email)->send(new UsersMail());

            Cart::instance('shopping')->destroy();
            return redirect('/ordered-product');
            // Now you have the payment details,
            // you can store the authorization_code in your db to allow for recurrent subscriptions
            // you can then redirect or do whatever you want
        }
    }

    //Placing order on delivery
    public function confirmOrder()
    {

        foreach (Cart::instance('shopping')->content() as $items) {
            $findProduct = Products::with('product_accessories', 'product_thrifts', 'product_brands', 'product_cosmetics', 'product_footwear')->find($items->id);

            if ($findProduct->total_quantity < 1) {
                session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                return null;
            } elseif ($findProduct->category  == 'Brands') {
                if ($items->qty  > $findProduct->product_brands->quantity1_sm && $items->size == 'Small' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_md && $items->size == 'Medium' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_lg && $items->size == 'Large' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_xl && $items->size == 'Xtra Large' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity1_xxl && $items->size == 'X Xtra Large' && $items->color == $findProduct->product_brands->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_sm && $items->size == 'Small' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_md && $items->size == 'Medium' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_lg && $items->size == 'Large' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_xl && $items->size == 'Xtra Large' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity2_xxl && $items->size == 'X Xtra Large' && $items->color == $findProduct->product_brands->color2) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_sm && $items->size == 'Small' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_md && $items->size == 'Medium' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_lg && $items->size == 'Large' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_xl && $items->size == 'Xtra Large' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_brands->quantity3_xxl && $items->size == 'X Xtra Large' && $items->color == $findProduct->product_brands->color3) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Accessories') {
                if ($items->qty > $findProduct->product_accessories->total_quantity) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Thrifts') {
                if ($items->qty > $findProduct->product_thrifts->quantity_sm  && $items->size == 'Small') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_md && $items->size == 'Medium') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_lg && $items->size == 'Large') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_xl && $items->size == 'Xtra large') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_thrifts->quantity_xxl && $items->size == 'X Xtra Large') {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Cosmetics') {
                if ($items->qty > $findProduct->product_cosmetics->total_quantity) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            } elseif ($findProduct->category  == 'Footwear') {
                if ($items->qty > $findProduct->product_footwear->quantity1_35 && $items->size == '35' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_36 && $items->size == '36' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_37 && $items->size == '37' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_38 && $items->size == '38' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_39 && $items->size == '39' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_40 && $items->size == '40' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_41 && $items->size == '41' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_42 && $items->size == '42' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_43 && $items->size == '43' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_44 && $items->size == '44' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_45 && $items->size == '45' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_46 && $items->size == '46' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_47 && $items->size == '47' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_48 && $items->size == '48' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity1_49 && $items->size == '49' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_35 && $items->size == '35' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_36 && $items->size == '36' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_37 && $items->size == '37' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_38 && $items->size == '38' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_39 && $items->size == '39' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_40 && $items->size == '40' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_41 && $items->size == '41' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_42 && $items->size == '42' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_43 && $items->size == '43' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_44 && $items->size == '44' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_45 && $items->size == '45' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_46 && $items->size == '46' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_47 && $items->size == '47' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_48 && $items->size == '48' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity2_49 && $items->size == '49' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_35 && $items->size == '35' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_36 && $items->size == '36' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_37 && $items->size == '37' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_38 && $items->size == '38' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_39 && $items->size == '39' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_40 && $items->size == '40' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_41 && $items->size == '41' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_42 && $items->size == '42' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_43 && $items->size == '43' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_44 && $items->size == '44' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_45 && $items->size == '45' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_46 && $items->size == '46' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_47 && $items->size == '47' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_48 && $items->size == '48' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                } elseif ($items->qty > $findProduct->product_footwear->quantity3_49 && $items->size == '49' && $items->color == $findProduct->product_footwear->color1) {
                    session()->flash('error', 'Item / one of the items has just been purchased by someone else! we apologise, kindly remove item  from cart to proceed.');
                    return null;
                }
            }
        }

        $order_id = random_int(10000000, 99999999);


        foreach (Cart::instance('shopping')->content() as $items) {
            $findProduct = Products::find($items->id);
            $transaction_id = '101' . random_int(0000000, 9999999);

            $this->createOrderTransaction($items->options->referral, $order_id, $items->id, $items->options->merchant_id, $items->qty, $items->options->color, $items->options->size, $items->options->img, $items->subtotal, $items->options->checkout_id, $transaction_id, $findProduct->merchants_price, $findProduct->valovov_price, $findProduct->referral_price, $items->options->coupon);
        }

        DeliveryAccount::create([
            'users_id' => Auth::user()->id,
            'transactions_id' => $transaction_id,
            'order_no' => $order_id,
            'destinations_id' => $this->destinationFees->destinations->id,
            'transaction_type' => 'Customer Payment',
            'transaction_method' => $this->transactionMethod,
            'amount' => $this->destinationFees->destinations->price,
            'auth_id' => 0,
            'status' => 1,
        ]);

        Mail::to('valovovshop@gmail.com')->send(new ConfirmOrder());

        Mail::to(Auth::user()->email)->send(new UsersMail());

        Cart::instance('shopping')->destroy();
        return redirect('/ordered-product');
    }


    public function render()
    {
        return view('livewire.auth.order');
    }
}
