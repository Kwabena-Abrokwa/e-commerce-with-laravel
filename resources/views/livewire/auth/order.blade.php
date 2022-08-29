<div class="root">
    <div class="loader w-screen left-0 top-0 h-screen shop-loader fixed z-50" wire:loading>
        <div class="icon my-60 block">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                style="margin: auto; background: #dad8d800; display: block; shape-rendering: auto;" width="56px"
                height="56px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                    stroke-dasharray="127.23450247038662 44.411500823462205">
                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s"
                        values="0 50 50;360 50 50" keyTimes="0;1">
                    </animateTransform>
                </circle>
        </div>
    </div>
    @if ($confirmCheckout)
        <div class="checkout ">
            @if (Cart::instance('shopping')->content()->count() > 0)
                <div class="order-content my-8 text-sm ">
                    <div class="products md:flex justify-between bg-black text-white p-3 my-8 hidden">
                        <div class="product-name lg:w-32">
                            <h4 class="text-sm">Product Image</h4>
                        </div>
                        <div class="product-name lg:w-1/3">
                            <h4 class="text-sm">Product Name - Color - Size</h4>
                        </div>
                        <div class="product-quantity ">
                            <h4 class="text-sm">Quantity</h4>
                        </div>
                        <div class="product-price">
                            <h4 class="text-sm">Subtotal</h4>
                        </div>
                    </div>
                    @foreach (Cart::instance('shopping')->content() as $items)
                        <div class="products hidden md:flex md:justify-between bg-gray-100 p-3 my-8">
                            <div class="product-image lg:w-32">

                                <img src="{{ Storage::disk('s3')->url($items->options->img) }}"
                                    class="w-20 h-20 mx-auto" alt="{{ $items->name }}">
                            </div>
                            @if ($items->options->color != '')
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm md:text-left">{{ $items->name }} -
                                        {{ $items->options->color }}
                                        - {{ $items->options->size }}
                                    </h4>
                                </div>
                            @else
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm md:text-left">{{ $items->name }}
                                    </h4>
                                </div>
                            @endif
                            <div class="product-quantity text-center my-auto flex md:block">
                                <h4 class="text-sm">x{{ $items->qty }}</h4>
                            </div>
                            <div class="product-price my-auto">
                                <h4 class="text-sm">Ghc {{ $items->subtotal }}</h4>
                            </div>
                        </div>

                        <div class="products md:hidden md:justify-between bg-gray-100 p-3 my-8">
                            <div class="product-image ">
                                <img src="{{ Storage::disk('s3')->url($items->options->img) }}"
                                    class="w-20 h-20 mx-auto" alt="{{ $items->name }}">
                            </div>
                            @if ($items->options->color != '')
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm text-center">{{ $items->name }} -
                                        {{ $items->options->color }}
                                        - {{ $items->options->size }}
                                    </h4>
                                </div>
                            @else
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm text-center">{{ $items->name }}
                                    </h4>
                                </div>
                            @endif
                            <div class="product-quantity text-center my-auto">
                                <h4 class="text-sm text-center">Quantity: x{{ $items->qty }}</h4>
                            </div>
                            <div class="product-price my-auto">
                                <h4 class="text-sm text-center">Ghc {{ $items->subtotal }}</h4>
                            </div>
                        </div>
                        @if (session()->has('error'))
                            <div class="fixed bottom-0 left-0 w-full">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h6 class="text-center"> {{ session('error') }}</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="md:flex justify-between mb-4 w-full">

                        <div class="px-8 w-full md:w-1/4 mb-4 py-3 shadow rounded cursor-pointer border-blue-400">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    wire:model="transactionMethod" value="Momo" checked>
                                <div class="flex align-center justify-between">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Pay with Mobile Money
                                    </label>
                                    <div class="image pl-3">
                                        <img src="{{ @asset('images/products/shop/Momo.jpg') }}"
                                            class="w-28 my-auto" alt="momo image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($destinationFees->destinations->payment_method == 1)
                            <div class="px-8 w-full md:w-1/4 mb-4 py-3 shadow rounded cursor-pointer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios3" wire:model="transactionMethod" value="Cash">
                                    <div class="flex align-center justify-between">
                                        <label class="form-check-label" for="exampleRadios3">
                                            Pay with Cash
                                        </label>
                                        <div class="image pl-3">
                                            <img src="{{ asset('images/products/shop/cash-on-delivery.jpg') }}"
                                                alt="cash on delivery image" class="w-28">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-8 w-full md:w-1/4 mb-4 py-3 shadow rounded cursor-pointer border-blue-400">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" wire:model="transactionMethod" value="Card">
                                    <div class="flex align-center justify-between">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Pay with Card
                                        </label>
                                        <div class="image pl-3">
                                            <img src="{{ @asset('images/products/shop/visa.jpg') }}"
                                                class="w-28 my-auto" alt="momo image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="px-2 w-full md:w-1/4 mb-4 py-4 shadow rounded cursor-pointer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios3" disabled>
                                    <div class="flex align-center justify-between">
                                        <label class="form-check-label text-red-600" for="exampleRadios3">
                                            Pay with Cash not supported in this location
                                        </label>
                                        <div class="image pl-3">
                                            <img src="{{ asset('images/products/shop/cash-on-delivery.jpg') }}"
                                                alt="cash on delivery image" class="w-20">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-8 w-full md:w-1/4 mb-4 py-3 shadow rounded cursor-pointer border-blue-400">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" wire:model="transactionMethod" value="Card">
                                    <div class="flex align-center justify-between">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Pay with Card
                                        </label>
                                        <div class="image pl-3">
                                            <img src="{{ @asset('images/products/shop/visa.jpg') }}"
                                                class="w-28 my-auto" alt="momo image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <div class=""><strong>Important Notice: Do not leave the
                                        website </strong> when making payments with Card or
                                    Mobile Money and in any case you have to leave for authentication purposes, kindly
                                    return back and wait for the process to be successful. When checking out with
                                    <strong> Card or Mobile Money</strong> as method of payment, kindly exercise patient
                                    for the payment to be successful and redirects you back to the order track
                                    page.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Total flex justify-between p-3 text-xl bg-black text-white text-sm font-bold">
                        <h2 class="text-sm">Delivery Fee:</h2>
                        <h2 class="text-sm" wire:model="total">Gh₵ {{ $destinationFees->destinations->price }}
                        </h2>
                    </div>
                    <div class="Total flex justify-between p-3 text-xl bg-black text-white text-sm font-bold">
                        <h2 class="text-lg">Total:</h2>
                        <h2 class="text-lg" wire:model="total">Gh₵
                            {{ $couponAmount + $destinationFees->destinations->price }}
                        </h2>
                    </div>
                    @if ($transactionMethod == 'Cash')
                        <div class="button mx-auto">
                            <button wire:click.prevent="confirmOrder"
                                class="btn btn-success mx-auto w-full my-4 py-4">Place
                                order with Cash On Delivery</button>
                        </div>
                    @elseif($transactionMethod == 'Momo')
                        <div class="button mx-auto">
                            <button wire:click.prevent="redirectToGateway"
                                class="btn btn-warning mx-auto w-full my-4 py-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Place order with Mobile Money
                            </button>
                        </div>
                    @else
                        <div class="button mx-auto">
                            <a wire:click.prevent="redirectToGateway"
                                class="btn btn-primary mx-auto w-full my-4 py-4">Place order
                                with Card</a>
                        </div>
                    @endif
                @else
                    <div class="nothing-in-cart my-24">
                        <img src="storage/products/home/components/shopping-cart.png" alt=""
                            class="w-20 block mx-auto mb-10">
                        <h1 class="text-3xl lg:text-6xl text-center">Nothing in cart to place order</h1>
                        <a href="/shop"
                            class="shadow bg-black text-white text-center cursor-pointer py-2 my-8 lg:w-1/3 block mx-auto">Start
                            shopping</a>
                    </div>
            @endif
        </div>
</div>
@else
<h2>No checkout Details</h2>
@endif
</div>
</div>
