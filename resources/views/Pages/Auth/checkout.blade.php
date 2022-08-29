@extends('Layouts.app')
@section('title')
    Checkout order
@endsection
@section('content')
    <div class="mt-28 py-4 w-full">
        <div class="header flex justify-between w-11/12 lg:w-1/2 block mx-auto">
            <div class="h1 font-bold text-gray-400 text-xs lg:text-xl">
                <a href="/cart">
                    <h4 class="font-bold text-gray-400 text-xs lg:text-xl">Shopping Cart</h4>
                </a>
            </div>
            <div class="icon ">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black" class="bi bi-caret-right-fill hidden lg:block" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-caret-right-fill lg:hidden" viewBox="0 0 16 16">
                      <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
            </div>
            <div class="h2 ">
                <a href="/checkout">
                    <h4 class="font-bold text-black text-xs lg:text-xl animate-pulse">Checkout</h4>
                </a>
            </div>
            <div class="iconAnimateProcess animate__animated animate__bounceIn">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black" class="bi bi-caret-right-fill hidden lg:block" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-caret-right-fill lg:hidden" viewBox="0 0 16 16">
                      <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
            </div>
            <div class="h3">
                <h4 class="font-bold text-gray-400 text-xs lg:text-xl">Complete Order</h4>
            </div>
        </div>
        @livewire('auth.checkout')
    </div>
@endsection
