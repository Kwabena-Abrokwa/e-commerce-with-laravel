@extends('Layouts.app')
@section('title')
    Your Wishlist || Valovov
@endsection
@section('content')
    <div class="mt-12 md:mt-32 py-4 w-full">
        <h3 class="px-2 py-3">Your wishlist</h3>
        @livewire('wishlist')
    </div>
@endsection
