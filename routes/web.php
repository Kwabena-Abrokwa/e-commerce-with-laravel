<?php

use App\Http\Controllers\RoutesController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Search;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login with facebook and google
Route::get('/auth/google/redirect', 'App\Http\Livewire\Signin@googlelogin');
Route::get('/auth/google/callback', 'App\Http\Livewire\Signin@googleCallBack');
Route::get('/auth/facebook/redirect', 'App\Http\Livewire\Signin@facebooklogin');
Route::get('/auth/facebook/callback', 'App\Http\Livewire\Signin@facebookCallBack');

//fluttewave payment
// The route that the button calls to initialize payment
// The callback url after a payment
Route::post('/pay', [RoutesController::class, 'redirectToGateway'])->name('pay');
Route::get('/rave/callback', 'App\Http\Livewire\Auth\Order@callback')->name('callback');
Route::get('/callbackPaystack', 'App\Http\Livewire\Auth\Order@handleGatewayCallback')->name('callbackPaystack');

//Search route
Route::get('/search/{name}', Search::class)->name('product.search');

//Normal route
Route::get('/', [RoutesController::class, 'index']);
Route::get('/shop', [RoutesController::class, 'shop'])->name('shop');
Route::get('/cart', [RoutesController::class, 'cart'])->name('cart');
Route::get('/wishlist', [RoutesController::class, 'wishlist']);
Route::get('/privacy-policy', [RoutesController::class, 'privacypolicy']);
Route::get('/category/{search}',[RoutesController::class, 'category']);
Route::get('/search',[RoutesController::class, 'index']);
Route::get('/filter/{categorytype}/{gender}',[RoutesController::class, 'filters']);
Route::get('/type/{search}/{attair}',[RoutesController::class, 'type']);
Route::get('/product/{id}/{referral}',[RoutesController::class, 'products']);
Route::get('/sign-in', [RoutesController::class, 'signin'])->name('login');
Route::get('/sign-up', [RoutesController::class, 'signup']);
Route::get('/about-us', [RoutesController::class, 'about']);
Route::get('/contact-us', [RoutesController::class, 'contact']);
Route::get('/sitemap.xml', [RoutesController::class, 'sitemap']);


//Authenticated route
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [RoutesController::class, 'checkout']);
    Route::get('/orders', [RoutesController::class, 'order']);
    Route::get('/ordered-product', [RoutesController::class, 'orderedProduct']);
    Route::get('/order-history', [RoutesController::class, 'orderHistory']);
    Route::get('/account', [RoutesController::class, 'account']);
    
    Route::get('/logout', 'App\Http\Livewire\Signin@logout');
});
