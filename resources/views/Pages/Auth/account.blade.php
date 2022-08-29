@extends('Layouts.app')
@section('title')
    Accounts and settings
@endsection
@section('content')
    <div class="mt-20 py-4 account-settings w-full">
        @livewire('auth.account')
    </div>
@endsection
