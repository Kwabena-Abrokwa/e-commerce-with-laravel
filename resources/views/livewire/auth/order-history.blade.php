<div class="id w-full ">
    @if ($orderCount > 0)
        @foreach ($orders as $order)
        <div>
            <div class="account-info w-5/6 my-8 mx-auto shadow bg-white rounded">
                <div class="forms w-full mx-auto">
                    <div class="header py-3 bg-black text-center text-white">
                        <h3 class="text-sm ">Order ID: {{ $order->order_no }}</h3>
                    </div>
                    <div class="details p-3 w-full">
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
                </div>
            </div>
        @endforeach
        <div class="p-2">
            <div href="" class=""> {{ $orders->links() }}</div>
        </div>
    </div>
    @else
        <div class="account-info w-5/6 p-2 my-8 mx-auto shadow bg-white rounded">
            <div class="forms w-11/12 md:w-3/4 mx-auto">
                <div class="icon mt-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto block" width="100" height="100" fill="gray"
                        class="bi bi-cart-x" viewBox="0 0 16 16">
                        <path
                            d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                        <path
                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                </div>
                <h1 class="text-xl lg:text-xl text-center">No orders availble</h1>
                <a href="/shop"
                    class="shadow bg-black text-white text-center cursor-pointer py-2 my-4 lg:w-1/4 block mx-auto">Start shopping</a>
            </div>
        </div>
    @endif
</div>
