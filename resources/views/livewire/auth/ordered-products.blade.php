<div class="root">
    @if ($countOrders)
        <div class="checkout">
            @if ($countOrders > 0)
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
                        <div class="product-price">
                            <h4 class="text-sm">Status</h4>
                        </div>
                    </div>
                    @foreach ($products as $product)
                        <div class="products hidden md:flex shadow-md rounded md:justify-between bg-gray-200 p-3 my-8">
                            <div class="product-image lg:w-32">

                                <div class="product-image ">
                                    <img src=" {{ Storage::disk('s3')->url($product->image) }}  " alt=""
                                        class="w-20 h-20 mx-auto">
                                </div>

                            </div>
                            @if ($product->color != '')
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm md:text-left">{{ $product->products->name }} -
                                        {{ $product->color }}
                                        - {{ $product->size }}
                                    </h4>
                                </div>
                            @else
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm md:text-left">{{ $product->products->name }}
                                    </h4>
                                </div>
                            @endif
                            <div class="product-quantity text-center my-auto flex md:block">
                                <h4 class="text-sm">x{{ $product->quantity }}</h4>
                            </div>
                            <div class="product-price my-auto">
                                <h4 class="text-sm">Ghc {{ $product->subtotal }}</h4>
                            </div>
                            <div class="product-price my-auto">
                                <button type="button" class="btn btn-primary text-sm"
                                    wire:click="trackProduct({{ $product->id }})" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Track order</button>
                            </div>
                        </div>

                        <div class="products md:hidden md:justify-between shadow-md rounded bg-gray-200 p-3 my-8">
                            <div class="product-image ">
                                <img src=" {{ Storage::disk('s3')->url($product->image) }}  " alt=""
                                    class="w-20 h-20 mx-auto">
                            </div>
                            @if ($product->color != '')
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm text-center">{{ $product->products->name }} -
                                        {{ $product->color }}
                                        - {{ $product->size }}
                                    </h4>
                                </div>
                            @else
                                <div class="product-name lg:w-1/3 font-bold my-auto">
                                    <h4 class="text-sm text-center">{{ $product->products->name }}
                                    </h4>
                                </div>
                            @endif
                            <div class="product-quantity text-center my-auto">
                                <h4 class="text-sm text-center">Quantity: x{{ $product->qty }}</h4>
                            </div>
                            <div class="product-price my-auto">
                                <h4 class="text-sm text-center">Ghc {{ $product->subtotal }}</h4>
                            </div>
                            <div class="product-price w-full my-auto">
                                <button type="button" wire:click="trackProduct({{ $product->id }})"
                                    class="btn btn-primary text-sm w-full">Track order</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                    <!-- Button trigger modal -->


                    @if ($productTracked > 0)
                        <!-- Modal -->
                        <div class="modal fade" id="modalTracker" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="md">
                                            <div class="home-product w-full mt-12 mb-3 block mx-auto">
                                                <div class="order-track">
                                                    <div class="header">
                                                        <h3>Orders-In-Progress</h3>
                                                    </div>
                                                    <div
                                                        class="contains m-3 mx-auto block relative">
                                                        <div class="header md:p-3 text-black flex justify-between">
                                                            <h3 class="text-sm">Order ID: {{ $userOrder->order_no }}</h3>
                                                            <h3 class="text-sm hidden md:block">{{ Auth::user()->name }}</h3>
                                                        </div>
                                                        <div class="md:hidden">
                                                            <h3 class="text-sm md:block">Status:
                                                                @if ($userOrder->status == 0)
                                                                    Confirming Order
                                                                @elseif ($userOrder->status == 1)
                                                                    Processing Order
                                                                @elseif ($userOrder->status == 2)
                                                                    Quality Checking
                                                                @elseif ($userOrder->status == 3)
                                                                    Product Dispatched
                                                                @elseif ($userOrder->status == 4)
                                                                    Product Delivered
                                                                @endif
                                                            </h3>
                                                        </div> 
                                                        <div
                                                            class="header bg-black p-3 text-center text-white flex justify-between">
                                                          
                                                            <h3 class="text-sm hidden md:block">Status:
                                                                @if ($userOrder->status == 0)
                                                                    Confirming Order
                                                                @elseif ($userOrder->status == 1)
                                                                    Processing Order
                                                                @elseif ($userOrder->status == 2)
                                                                    Quality Checking
                                                                @elseif ($userOrder->status == 3)
                                                                    Product Dispatched
                                                                @elseif ($userOrder->status == 4)
                                                                    Product Delivered
                                                                @endif
                                                            </h3>
                                                            <h3 class="text-sm">Expected Date:  {{ date('d-m-Y', strtotime( $userOrder->created_at->addDays(2)))}}</h3>
                                                        </div>
                                                        <div
                                                            class="process overflow-x-scroll md:overflow-x-hidden bg-white py-6 px-2 flex mx-auto block w-full">
                                                            @if ($userOrder->status == 0)
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class="first">
                                                                        <div
                                                                            class="order-track animate-pulse rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/shopping-cart.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Confirming Order</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class=" first">
                                                                        <div
                                                                            class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/settings.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Process Order</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class=" first">
                                                                        <div
                                                                            class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/medal.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Quality Check</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class=" first">
                                                                        <div
                                                                            class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/scooter.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Product Dispatch</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm pr-8 md:pr-0 mx-auto">
                                                                    <div
                                                                        class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                        <img src="{{ asset('images/products/home/components/home.png') }}"
                                                                            alt=""
                                                                            class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                    </div>
                                                                    <div class="text py-3 text-center">
                                                                        <p>Product Delivery</p>
                                                                    </div>
                                                                </div>
                                                            @elseif ($userOrder->status == 1)
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class="first">
                                                                        <div
                                                                            class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/shopping-cart.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Order Confirmed</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class=" first">
                                                                        <div
                                                                            class="order-track animate-pulse rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/settings.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Processing Order</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class=" first">
                                                                        <div
                                                                            class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/medal.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Quality Check</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class=" first">
                                                                        <div
                                                                            class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/scooter.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Product Dispatch</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto">
                                                                    <div class="first">
                                                                        <div
                                                                            class="rounded-full shadow bg-white  w-32 h-32 border-2 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/home.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Product Delivery</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($userOrder->status == 2)
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class=" ">
                                                                        <div class="first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/shopping-cart.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Order Confirmed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto">
                                                                                <img src="{{ asset('images/products/home/components/settings.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Order Processed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track animate-pulse rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto">
                                                                                <img src="{{ asset('images/products/home/components/medal.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Quality Check</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="rounded-full border-2 shadow bg-white w-32 md:h-16 md:w-16 mx-auto  ">
                                                                                <img src="{{ asset('images/products/home/components/scooter.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Product Dispatch</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto">
                                                                    <div class="first">
                                                                        <div
                                                                            class="rounded-full border-2 shadow bg-white w-32 md:h-16 md:w-16 mx-auto  ">
                                                                            <img src="{{ asset('images/products/home/components/home.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Product Delivery</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($userOrder->status == 3)
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class=" ">
                                                                        <div class="first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/shopping-cart.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Order Confirmed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/settings.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Order Processed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/medal.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Quality Checked</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track animate-pulse rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto">
                                                                                <img src="{{ asset('images/products/home/components/scooter.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Product Dispatched</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto">
                                                                    <div class="first">
                                                                        <div
                                                                            class="rounded-full border-2 shadow bg-white w-32 md:h-16 md:w-16 mx-auto  ">
                                                                            <img src="{{ asset('images/products/home/components/home.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Product Delivery</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($userOrder->status == 4)
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0pr-8 md:pr-0">
                                                                    <div class=" ">
                                                                        <div class="first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/shopping-cart.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Order Confirmed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/settings.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Order Processed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/medal.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Quality Checked</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto pr-8 md:pr-0">
                                                                    <div class="">
                                                                        <div class=" first">
                                                                            <div
                                                                                class="order-track rounded-full bg-yellow-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                                <img src="{{ asset('images/products/home/components/scooter.png') }}"
                                                                                    alt=""
                                                                                    class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                            </div>
                                                                            <div class="text py-3 text-center">
                                                                                <p>Product Dispatched</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order-confirm  mx-auto">
                                                                    <div class="first">
                                                                        <div
                                                                            class="order-track rounded-full bg-green-400 w-32 h-32 md:h-16 md:w-16 mx-auto ">
                                                                            <img src="{{ asset('images/products/home/components/home.png') }}"
                                                                                alt=""
                                                                                class="w-1/2 py-8 md:py-4 block mx-auto  ">
                                                                        </div>
                                                                        <div class="text py-3 text-center">
                                                                            <p>Product Delivered</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
            <div class="nothing-in-cart my-24">
                <img src="storage/products/home/components/shopping-cart.png" alt="" class="w-20 block mx-auto mb-10">
                <h1 class="text-3xl lg:text-6xl text-center">No products found</h1>
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
