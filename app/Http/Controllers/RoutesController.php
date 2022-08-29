<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Redirect;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class RoutesController extends Controller
{
    public function index()
    {
        return view('Pages.index');
    }
    public function shop()
    {
        return view('Pages.shop');
    }
    public function category($search)
    {
        $searchCategory = $search;
        return view('Pages.category')->with('searchCategory', $searchCategory);
    }
    public function type($search, $attair)
    {
        $searchCategory = $search;
        $attair = $attair;
        return view('Pages.type',  compact('searchCategory', 'attair'));
    }
    public function filters($categorytype, $gender)
    {
        $categoryType = $categorytype;
        $gender = $gender;
        return view('Pages.filter', compact('categorytype', 'gender'));
    }
    public function products($id, $referral)
    {
        $id = $id;
        $referral = $referral;
        return view('Pages.product', compact('id', 'referral'));
    }
    public function cart()
    {
        return view('Pages.cart');
    }
    public function wishlist()
    {
        return view('Pages.wishlist');
    }
    public function checkout()
    {
        return view('Pages.Auth.checkout');
    }
    public function signin()
    {
        return view('Pages.signin');
    }
    public function privacypolicy()
    {
        return view('Pages.privacypolicies');
    }
    public function signup()
    {
        return view('Pages.signup');
    }
    public function about()
    {
        return view('Pages.about');
    }
    public function contact()
    {
        return view('Pages.contact');
    }
    public function order()
    {
        return view('Pages.Auth.order');
    }
    public function orderedProduct()
    {
        return view('Pages.Auth.orderedProduct');
    }
    public function account()
    {
        return view('Pages.Auth.account');
    }
    public function orderHistory()
    {
        return view('Pages.Auth.orderHistory');
    }
    public function sitemap()
    {
        return response()->redirectTo(config('app.asset_url').'/sitemap.xml', 302, [
            'Content-Type' => 'text/plain',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
