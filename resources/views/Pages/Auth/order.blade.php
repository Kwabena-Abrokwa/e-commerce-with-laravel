@extends('Layouts.app')
@section('title')
    Your final order process
@endsection
@section('content')
    <div class="mt-28 py-4 w-11/12 md:w-5/6 mx-auto">
        <div class="header flex justify-between w-11/12 lg:w-1/2 block mx-auto">
            <div class="h1 font-bold text-gray-400 text-xs lg:text-xl">
                <a href="/cart">
                    <h4 class="font-bold text-gray-400 text-xs lg:text-xl">Shopping Cart</h4>
                </a>
            </div>
            <div class="icon ">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                    class="bi bi-caret-right-fill hidden lg:block" viewBox="0 0 16 16">
                    <path
                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="green"
                    class="bi bi-caret-right-fill lg:hidden" viewBox="0 0 16 16">
                    <path
                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg>
            </div>
            <div class="h2 ">
                <a href="/checkout">
                    <h4 class="text-gray-400 font-bold text-xs lg:text-xl ">Checkout</h4>
                </a>
            </div>
            <div class=" ">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                    class="bi bi-caret-right-fill hidden lg:block" viewBox="0 0 16 16">
                    <path
                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="green"
                    class="bi bi-caret-right-fill lg:hidden" viewBox="0 0 16 16">
                    <path
                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg>
            </div>
            <div class="h3">
                <h4 class="font-bold text-xs lg:text-xl animate-pulse animate__animated animate__bounceIn">
                    Complete Order</h4>
            </div>
        </div>
        <div class="header-order-setting mt-4">
            <h1 class="text-3xl font-bold lg:text-left">Your Order</h1>
        </div>
        @livewire('auth.order')
        <script>
            function myFunction() {
                /* Get the text field */
                var copyText = document.getElementById("order_no");
              
                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */
              
                 /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);
              
                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
              }
        </script>
    @endsection
