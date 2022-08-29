<div class=" w-full mt-4">
    <div class="account-info w-11/12 md:w-5/6 p-2 my-8 mx-auto shadow bg-white rounded">
        <h3 class="text-center">Order History</h3>
        <div class="order">
            <div class="details py-2">
                <p class="text-center">Your recent order history</p>
            </div>
            @if ($orderCount > 0)
                @foreach ($orders as $order)
                    <div class="forms w-full md:w-3/4 mx-auto">
                        <div class="header bg-black py-2 text-center text-white">
                            <h3 class="text-sm ">Order ID: {{ $order->order_no }}</h3>
                        </div>
                        <div class="product md:flex md:justify-between">
                            <h4 class="md:w-1/2 text-sm">Product Name: {{ $order->products->name }}</h4>
                            <h4 class="md:w-1/2 text-sm">Date: {{ $order->created_at }}</h4>
                        </div>
                        <div class="product md:flex md:justify-between">
                            <h4 class="md:w-1/2 text-sm">Product Price: {{ $order->subtotal }}</h4>
                            <h4 class="md:w-1/2 text-sm md:block animate-pulse">Status:
                                @if ($order->status == 0)
                                   <span class="text-yellow-500 "> Confirming Order</span>
                                @elseif ($order->status == 1)
                                <span class="text-yellow-500 "> Processing Order</span>
                                @elseif ($order->status == 2)
                                <span class="text-yellow-500 ">  Quality Checking</span>
                                @elseif ($order->status == 3)
                                <span class="text-red-500 ">  Product Dispatched</span>
                                @elseif ($order->status == 4)
                                <span class="text-green-500 "> Product Delivered</span>
                                @endif
                            </h4>
                        </div>
                        <div class="product md:flex md:justify-between">
                            @if ($order->checkouts_id == $checkoutInfo->id)
                            <h4 class="md:w-1/2 text-sm">Delivery Price: {{ $checkoutInfo->destinations->price }}</h4>
                            <h4 class="md:w-1/2 text-sm">Delivery Location: {{ $checkoutInfo->destinations->location }}</h4>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="input w-11/12 md:w-3/4 my-4 mx-auto ">
                        <a href="/order-history" class="btn btn-success w-full mx-auto py-2">View all order history</a>
                    </div>
                    <div class="input w-11/12 md:w-3/4 my-4 mx-auto ">
                        <a href="/ordered-product" class="btn btn-primary w-full mx-auto py-2">Got to track orders</a>
                    </div>
            @else
                <div class="forms w-11/12 md:w-3/4 mx-auto py-4">
                    <div class="icon mt-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto block" width="100" height="100"
                            fill="gray" class="bi bi-cart-x" viewBox="0 0 16 16">
                            <path
                                d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </div>
                    <h1 class="text-xl lg:text-xl text-center">No orders available</h1>
                    <a href="/shop"
                        class="shadow bg-black text-white text-center cursor-pointer py-2 my-4 lg:w-1/4 block mx-auto">Start
                        shopping</a>
                </div>
            @endif
        </div>
    </div>
    <div class="account-info w-11/12 md:w-5/6 px-6 py-4 my-8 mx-auto shadow bg-white rounded">
        <h3 class="text-center">Account Settings</h3>
        <div class="">
            <div class="forms w-11/12 mx-auto md:w-3/4">
                <form wire:submit.prevent="updateDetails">
                    <div class="input md:flex my-4">
                        <label for="" class="pr-2 w-11/12 md:w-80">Username</label>
                        <input type="text" wire:model.defer="username" class="form-control">
                    </div>
                    <div class="input md:flex my-4">
                        <label for="" class=" pr-2 w-11/12 md:w-80">Email</label>
                        <input type="email" class="form-control" disabled value="{{ Auth::user()->email }}">
                    </div>
                    <div class="input md:flex my-4">
                        <label for="" class=" pr-2 w-11/12 md:w-80">New Password</label>
                        <input type="password" wire:model.defer="password" class="form-control">
                    </div>
                    <div class="input md:flex my-4">
                        <label for="" class=" pr-2 w-11/12 md:w-80">Confirm New Password</label>
                        <input type="password" wire:model.defer="password_confirmation" class="form-control">
                    </div>
                    <div class="text-red-600 text-center pt-2">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    @if (session()->has('message'))
                        <div class="text-green-800 text-center pt-2">
                            {{ session('message') }}
                        </div>
                    @endif
            </div>
        </div>
        <div class="input w-11/12 my-4 mx-auto ">
            <button type="submit" class="btn btn-dark w-full mx-auto py-2">Save changes</button>
        </div>
        </form>
    </div>
    <div class="account-info w-11/12 md:w-5/6 p-2 my-8 mx-auto shadow bg-white rounded">
        <form action="" wire:submit.prevent="disableAccount">
            <h3 class="text-center">Disable Account</h3>
            <div class="">
                <div class="details py-2">
                    <p class="text-center">Once you disable this account you can not create a new account with this
                        email creditials again</p>
                </div>
                <div class="forms w-11/12 md:w-3/4 mx-auto">
                    <div class="input my-4">
                        <label for="" class="">Password</label>
                        <input type="password" class="form-control" wire:model.defer="disablePassword">
                    </div>
                </div>
            </div>
            <div class="text-red-600 text-center pt-2">
                @error('disablePassword')
                    {{ $message }}
                @enderror
            </div>
            @if (session()->has('disableMessage'))
                <div class="text-green-800 text-center pt-2">
                    {{ session('disableMessage') }}
                </div>
            @endif
            @if (session()->has('disableError'))
                <div class="text-red-800 text-center pt-2">
                    {{ session('disableError') }}
                </div>
            @endif
            <div class="input w-11/12 md:w-3/4 my-4 mx-auto ">
                <button type="submit" class="btn btn-danger w-full mx-auto py-2">Disable account</button>
            </div>
        </form>
    </div>
</div>
