@extends('Layouts.app')
@section('title')
    Track your product from here
@endsection
@section('content')
    <div class="mt-28 py-4 w-5/6 mx-auto">
        <h5>Your orders</h5>
        @livewire('auth.ordered-products')
    </div>
    <script>
        window.addEventListener('showModalTracker', event=> {
            $('#modalTracker').modal('show');
        })
    </script>
@endsection