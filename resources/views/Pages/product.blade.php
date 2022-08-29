@extends('Layouts.app')
@section('meta')
    <meta name="description"
        content="Shop t-shirts, watches, joggers, designer bags, sneakers, cosmetics, accessories, brands, footwears and other items for sale. Buy cheap T-shirts, Jeans, Bags, Skirts , Blouses.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description"
        content="Shop t-shirts, watches, joggers, designer bags, and other items for sale. Buy cheap T- shirts, Jeans, Bags, Skirts , Blouses." />
        <meta property="og:image"
        content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl1.jpg" />
    <meta property="og:url" content="https://www.valovov.com/shop" />
    <meta property="og:site_name" content="https://www.valovov.com/" />
@endsection
@section('title')
    Categories || Valovov || Accessories | Brands | Cosmetics | Footwears | Thrifts
@endsection
@section('content')
        <div class="content w-11/12 mx-auto my-28">
            @livewire('products-list', ['id' => $id, 'referral' => $referral])
        </div>
@endsection
