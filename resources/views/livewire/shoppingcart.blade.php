<div class="id">
    <div class="">
        @if (session()->has('error'))
            <div class="text-red-600 text-center py-1">
                {{ session('error') }}
            </div>
        @endif
        @if (Cart::instance('shopping')->content()->count() > 0)
            <div class="products-in-cart xl:flex w-full xl:w-11/12 block mx-auto my-16">
                <div
                    class="cart-product md:pr-8 w-11/12 block mx-auto text-center lg:text-left animate__animated animate__backInDown">
                    <div class="titles hidden md:flex justify-between">
                        <h6 class="w-1/6">Product IMAGE</h6>
                        <h6 class="w-2/6">NAME - COLOR - SIZE</h6>
                        <h6 class="w-1/6">PRICE</h6>
                        <h6 class="w-1/6">QUANTITY</h6>
                        <h6 class="w-1/6">SUBTOTAL</h6>
                    </div>
                    @foreach (Cart::instance('shopping')->content() as $items)
                        <div
                            class="product border-t md:flex md:justify-between py-10 px-4 md:p-0 md:py-2 mx-auto text-center lg:text-left">
                            <div class="md:w-1/6 w-full my-auto relative"
                                wire:click='removeProduct("{{ $items->rowId }}")'>
                                <div
                                    class="absolute z-30 p-1 rounded-full shadow-md border -top-1 bg-white right-10 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                        class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                                <div wire:loading wire:target='removeProduct("{{ $items->rowId }}")'
                                    class='deleteloader absolute w-full left-0 h-40 md:h-28 mx-auto z-40'>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        style="margin: 25px auto 0 auto; background: #ffffff25; display: block; shape-rendering: auto;"
                                        width="40px" height="40px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                        <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                                            stroke-dasharray="127.23450247038662 44.411500823462205">
                                            <animateTransform attributeName="transform" type="rotate"
                                                repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                                                keyTimes="0;1">
                                            </animateTransform>
                                        </circle>
                                </div>
                                <img src="{{ Storage::disk('s3')->url($items->options->img) }}"
                                    class="w-28 h-28 hidden md:block" alt="{{ $items->name }}">

                                <img src="{{ Storage::disk('s3')->url($items->options->img) }}"
                                    class="w-24 h-24 mx-auto md:hidden" alt="{{ $items->name }}">

                            </div>
                            @if ($items->options->color != '')
                                <h6 class="md:w-2/6 w-full my-auto py-2 md:py-0">
                                    {{ $items->name . ' -' . $items->options->color . ' -' . $items->options->size }}
                                </h6>
                            @else
                                <h6 class="md:w-2/6 w-full my-auto py-2 md:py-0">
                                    {{ $items->name }}
                                </h6>
                            @endif
                            <h6 class="md:w-1/6 w-full my-auto py-2 md:py-0">Ghc {{ $items->price }}</h6>
                            <div class="xl:w-1/6 w-full my-auto py-2 md:py-0">
                                <div class="flex flex-row h-10 rounded-lg relative bg-transparent w-full">
                                    <button wire:click='decrement("{{ $items->rowId }}")'
                                        class=" bg-white border border-black text-black hover:text-gray-700 hover:bg-gray-400 md:h-full w-8 md:w-6 cursor-pointer outline-none mx-auto w-full">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>

                                    <input type="text"
                                        class="outline-none focus:outline-none text-center w-8 bg-white font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-800  border border-black outline-none mx-auto w-full"
                                        value="{{ $items->qty }}"></input>
                                    <button wire:click='increment("{{ $items->rowId }}", {{ $items->id }})'
                                        class="bg-white border border-black text-black hover:text-gray-700 hover:bg-gray-400 h-full w-8 md:w-6 cursor-pointer mx-auto w-full">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                            <h6 class="md:w-1/6 my-auto hidden md:block ">Ghc {{ $items->subtotal }}</h6>
                        </div>
                    @endforeach
                    <div class="border-b"></div>
                    <div class="md:flex items-center my-3">
                        <div class="w-full md:w-1/3 my-3 mr-2">
                            <input wire:model="couponCode" type="text" placeholder="Enter coupon code"
                                class="form-control">
                        </div>
                        <div class="md:w-1/6 my-2">
                            <button wire:click="applyCoupon" class="btn btn-primary w-full">Apply</button>
                        </div>
                    </div>
                    <div class="text-red-600 text-left">
                        @error('couponCode')
                            {{ $message }}
                        @enderror
                    </div>
                    @if (session()->has('couponMessage'))
                        <div class="text-green-800 text-left">
                            {{ session('couponMessage') }}
                        </div>
                    @endif
                    @if (session()->has('couponError'))
                        <div class="text-red-800 text-left">
                            {{ session('couponError') }}
                        </div>
                    @endif
                </div>
                <div
                    class="subtotal xl:w-1/4 w-11/12 border mt-3 lg:mt-0 shadow py-4 px-6 block mx-auto animate__animated animate__backInRight">
                    <h5>Cart Total</h5>
                    <div class="list border-t flex justify-between pt-2 mt-4">
                        <h6>Quantity</h6>
                        <h6>Subtotals</h6>
                    </div>
                    @foreach (Cart::instance('shopping')->content() as $items)
                        <div class="list flex justify-between pt-2">
                            <h6 class="pl-10">{{ $items->qty }}</h6>
                            <h6>Ghc {{ $items->subtotal }}</h6>
                        </div>
                    @endforeach
                    <div class="list border-t border-b flex justify-between py-3">
                        <h6>Total</h6>
                        <h6 class="font-bold">Ghc {{ $couponAmount }}</h6>
                    </div>
                    <a href="checkout" class="btn btn-dark py-2 my-4 w-full block mx-auto"> Proceed to checkout </a>
                </div>
            </div>
        @else
            <div class="nothing-in-cart w-11/12 my-6 block mx-auto animate__animated animate__backInDown">
                <div class="icon mt-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto block" width="100" height="100" fill="gray"
                        class="bi bi-cart-x" viewBox="0 0 16 16">
                        <path
                            d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                        <path
                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                </div>
                <h1 class="text-xl lg:text-xl text-center">Nothing in the Cart</h1>
                <a href="/shop"
                    class="shadow bg-black text-white text-center cursor-pointer py-2 my-4 lg:w-1/4 block mx-auto">Return
                    to
                    shop</a>
                @guest
                    <a href="/shop"
                        class="shadow bg-yellow-600 text-white text-center cursor-pointer py-2 my-4 lg:w-1/4 block mx-auto">Login
                        to your account</a>
                @endguest
            </div>
        @endif
    </div>
</div>
