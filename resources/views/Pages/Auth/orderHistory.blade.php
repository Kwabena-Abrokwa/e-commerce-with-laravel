@extends('Layouts.app')
@section('title')
   Order History
@endsection
@section('content')
    <div class="mt-24 py-4 account-settings w-full">
        <h3 class="text-center">Order History</h3>
        @livewire('auth.order-history')
    </div>
@endsection
