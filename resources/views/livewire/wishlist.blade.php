<div class="id">
    @if (session()->has('error'))
        <div class="text-red-600 text-center py-1">
            {{ session('error') }}
        </div>
    @endif
    @if (Cart::instance('wishlist')->content()->count() > 0)
        <div class="products-in-cart xl:flex w-full xl:w-11/12 block mx-auto my-16">
            <div
                class="cart-product md:pr-8 w-11/12 block mx-auto text-center lg:text-left animate__animated animate__backInDown">
                <div class="titles hidden md:flex justify-between">
                    <h6 class="w-1/6">Product IMAGE</h6>
                    <h6 class="w-1/6">NAME</h6>
                    <h6 class="w-1/6">PRICE</h6>
                    <h6 class="w-1/6">OPTIONS</h6>
                </div>
                @foreach (Cart::instance('wishlist')->content() as $items)
                    @foreach ($products as $product)
                        @if ($product->id == $items->id)
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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            style="margin: 25px auto 0 auto; background: #ffffff25; display: block; shape-rendering: auto;"
                                            width="40px" height="40px" viewBox="0 0 100 100"
                                            preserveAspectRatio="xMidYMid">
                                            <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                                                stroke-dasharray="127.23450247038662 44.411500823462205">
                                                <animateTransform attributeName="transform" type="rotate"
                                                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                                                    keyTimes="0;1">
                                                </animateTransform>
                                            </circle>
                                    </div>

                                    @if ($product->category == 'Accessories')
                                        <img src="{{ Storage::disk('s3')->url($product->product_accessories->image1) }}"
                                            class="w-28 h-28 hidden md:block" alt="{{ $product->name }}">
                                    @elseif ($product->category == 'Brands')
                                        <img src="{{ Storage::disk('s3')->url($product->product_brands->image1) }}"
                                            class="w-28 h-28 hidden md:block" alt="{{ $product->name }}">
                                    @elseif ($product->category == 'Cosmetics')
                                        <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image1) }}"
                                            class="w-28 h-28 hidden md:block" alt="{{ $product->name }}">
                                    @elseif ($product->category == 'Thrifts')
                                        <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image1) }}"
                                            class="w-28 h-28 hidden md:block" alt="{{ $product->name }}">
                                    @elseif ($product->category == 'Footwears')
                                        <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                            class="w-28 h-28 hidden md:block" alt="{{ $product->name }}">
                                    @endif

                                    @if ($product->category == 'Accessories')
                                        <img src="{{ Storage::disk('s3')->url($product->product_accessories->image1) }}"
                                            class="w-24 h-24 mx-auto md:hidden" alt="{{ $items->name }}">
                                    @elseif ($product->category == 'Brands')
                                        <img src="{{ Storage::disk('s3')->url($product->product_brands->image1) }}"
                                            class="w-24 h-24 mx-auto md:hidden" alt="{{ $items->name }}">
                                    @elseif ($product->category == 'Cosmetics')
                                        <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image1) }}"
                                            class="w-24 h-24 mx-auto md:hidden" alt="{{ $items->name }}">
                                    @elseif ($product->category == 'Thrifts')
                                        <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image1) }}"
                                            class="w-24 h-24 mx-auto md:hidden" alt="{{ $items->name }}">
                                    @elseif ($product->category == 'Footwears')
                                        <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                            class="w-24 h-24 mx-auto md:hidden" alt="{{ $items->name }}">
                                    @endif

                                </div>
                                <h6 class="md:w-1/6 w-full my-auto py-2 md:py-0">
                                    {{ $items->name }}
                                </h6>
                                <h6 class="md:w-1/6 w-full my-auto py-2 md:py-0">Ghc {{ $items->price }}</h6>

                                <div class="add-to-cart my-auto w1/6">
                                    <button class="btn btn-dark py-2 text-white w-full"
                                        wire:click="addToCart({{ $items->id }})" wire:loading.remove
                                        wire:target="addToCart({{ $items->id }})">VIEW PRODUCT</button>
                                    <a href="#" class="btn btn-dark w-full mx-auto " wire:loading
                                        wire:target="addToCart({{ $items->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            style="margin: auto; background: #1f1f1fbb; display: block; shape-rendering: auto;"
                                            width="36px" height="36px" viewBox="0 0 100 100"
                                            preserveAspectRatio="xMidYMid">
                                            <circle cx="50" cy="50" fill="none" stroke="#ffff" stroke-width="4" r="27"
                                                stroke-dasharray="127.23450247038662 44.411500823462205">
                                                <animateTransform attributeName="transform" type="rotate"
                                                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                                                    keyTimes="0;1">
                                                </animateTransform>
                                            </circle>
                                    </a>
                                </div>
                            </div>
                            <div class="text-red-600 py-1 text-center">
                                @error('productColor')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="text-red-600 py-1 text-center">
                                @error('productSize')
                                    {{ $message }}
                                @enderror
                            </div>
                            @if (session()->has('error'))
                                <div class="text-red-600 text-center py-1">
                                    {{ session('error') }}
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div class="border-b"></div>
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
                <h1 class="text-xl lg:text-xl text-center">Nothing in the Wishlist</h1>
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
        </div>
    @endif
</div>

