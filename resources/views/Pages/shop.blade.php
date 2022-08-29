@extends('Layouts.app')
@section('meta')
    <meta name="description"
        content="Shop t-shirts, watches, joggers, designer bags, sneakers, cosmetics, accessories, brands, footwears and other items for sale. Buy cheap T-shirts, Jeans, Bags, Skirts , Blouses.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description"
        content="Shop t-shirts, watches, joggers, designer bags, and other items for sale. Buy cheap T- shirts, Jeans, Bags, Skirts , Blouses." />
    <meta property="og:image" content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl2.jpg" />
    <meta property="og:url" content="https://www.valovov.com/shop" />
    <meta property="og:site_name" content="https://www.valovov.com/" />
@endsection
@section('title')
    Shop t-shirts, watches, joggers, designer bags, sneakers, cosmetics, accessories, brands, footwears and other items for
    sale. Buy cheap T-shirts, Jeans, Bags, Skirts , Blouses.
@endsection
@section('content')
    <div class="lg:flex mt-16 lg:mt-28  py-2">
        @include('Components.sidebar')
        <div class="content w-full">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-block banner1 w-full h-80" alt="..."></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block banner2 w-full h-80" alt="..."></div>
                        <div class="carousel-caption ">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            @livewire('shop')
        </div>
    </div>
    <script>
        window.addEventListener('showModal', event => {
            $('#productModel').modal('show');
        })

        $('.filters-btn').on('click', function() {
            $('.filters').animate({
                width: '340px'
            });
        })

        $('.closeBtn').on('click', function() {
            $('.filters').animate({
                width: 0
            });
        })
    </script>
@endsection
