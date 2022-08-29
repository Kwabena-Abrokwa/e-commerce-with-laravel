@extends('Layouts.app')
@section('meta')
    @if (Request::path() == 'category/Brands') 
    <meta name="description"
        content=" Shop the most recent product collections from top brands from around the world at the most competitive prices in Ghana. There are branded T-shirts, watches, joggers, designer bags, and other items for sale.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Shop Brands - Valovov" />
    <meta property="og:description" content=" Shop the most recent product collections from top brands from around the world at the most competitive prices in Ghana. There are branded T-shirts, watches, joggers, designer bags, and other items for sale." />
    <meta property="og:image"
    content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg" />
    <meta property="og:url" content="https://www.valovov.com/category/Brands" />
    <meta property="og:site_name" content="Valovov" />
    @elseif (Request::path() == 'category/Cosmetics')
    <meta name="description"
        content=" At Valovov, you'll find the most up-to-date beauty trends. Explore our unrivaled selection of makeup, skin care, fragrance, hair products, lotions, and more from classic and emerging brands.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Shop Cosmetics - Valovov "/>
    <meta property="og:description" content=" At Valovov, you'll find the most up-to-date beauty trends. Explore our unrivaled selection of makeup, skin care, fragrance, hair products, lotions, and more from classic and emerging brands." />
    <meta property="og:image"
    content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg" />
    <meta property="og:url" content="https://www.valovov.com/category/Cosmetics" />
    <meta property="og:site_name" content="Valovov" />
    @elseif (Request::path() == 'category/Accessories')
    <meta name="description"
        content="Shop Valovov's women's and men's fashion accessories online. Shop the largest selection of fashion accessories, including bracelets, watches, purses, jewelry, & more.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description" content=":Shop Valovov's women's and men's fashion accessories online. Shop the largest selection of fashion accessories, including bracelets, watches, purses, jewelry, & more." />
    <meta property="og:image"
    content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg" />
    <meta property="og:url" content="https://www.valovov.com/category/Accessories" />
    <meta property="og:site_name" content="Valovov" />
    @elseif (Request::path() == 'category/Footwear')
    <meta name="description"
        content="Explore the wide range of stylish Footwear for men and women on Valovov. Shop from sneakers, sandals, flipflops & many more.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description" content="Explore the wide range of stylish Footwear for men and women on Valovov. Shop from sneakers, sandals, flipflops & many more." />
    <meta property="og:image"
    content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg" />
    <meta property="og:url" content="https://www.valovov.com/category/Footwear" />
    <meta property="og:site_name" content="Valovov.com" />
    @elseif (Request::path() == 'category/Thrifts')
    <meta name="description"
        content="Shop cheap T-shirts, Jeans, Bags, Skirts , Blouses.... buy cheap thrift products ,vintage clothing & retro style - rare vintage clothing items available.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description" content="Shop cheap T-shirts, Jeans, Bags, Skirts , Blouses.... buy cheap thrift products ,vintage clothing & retro style - rare vintage clothing items available." />
    <meta property="og:image"
    content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl3.jpg" />
    <meta property="og:url" content="https://www.valovov.com/category/Thrifts" />
    <meta property="og:site_name" content="Valovov.com" />
    @endif
@endsection
@section('title')
    Categories || Valovov || Accessories | Brands | Cosmetics | Footwears | Thrifts
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
                        <div class="d-block banner1 w-full h-80"></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block banner2 w-full h-80"></div>
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
            @livewire('category', ['searchCategory' => $searchCategory])
        </div>
    </div>
    <script>
        window.addEventListener('showModal', event =>{
            $('#productModel').modal('show');
        })

        $('.filters-btn').on('click', function(){
            $('.filters').animate({
                    width: '340px'
                });
        })

        $('.closeBtn').on('click', function(){
            $('.filters').animate({
                    width: 0
                });
        })
    </script>
@endsection
