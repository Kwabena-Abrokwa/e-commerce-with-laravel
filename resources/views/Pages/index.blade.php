@extends('Layouts.app')
@section('meta')
    <meta name="description"
        content="Valovov is Ghana's No.1 Online Fashion Mall. Shop our range of women's and men's clothing for the latest fashion trends">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description" content="Valovov is Ghana's No.1 Online Fashion Mall. Shop our range of women's and men's clothing for the latest fashion trends" />
    <meta property="og:image" content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg" />
    <meta property="og:url" content="https://www.valovov.com/" />
    <meta property="og:site_name" content="Valovov" />
@endsection
@section('title')
    Valovov Shop | Ghana's No. 1 online fashion store. 
@endsection
@section('content')
    <div id="slider" class="content mt-12 lg:mt-24">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-block wallpaper1 w-full h-screen"></div>
                    <div class="carousel-caption block">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-block wallpaper2 w-full h-screen"></div>
                    <div class="carousel-caption block">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-block wallpaper3 w-full h-screen"></div>
                    <div class="carousel-caption block">
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
        <div class="shop-by my-10 w-11/12 block mx-auto text-center">
            <div class="header text-sm">
                <h5 class="text-lg xl:text-2xl font-extrabold text-center">SHOP BY CATEGORIES</h5>
            </div>
            @livewire('items')
        </div>
        <div class="w-full bg-gray-200 px-2 py-8 block mx-auto my-12">
            <div id="animatedShopby" class="w-full xl:w-11/12 lg:flex lg:justify-evenly block mx-auto ">

                <div class="shop-by3 block mx-auto cursor-pointer w-11/12 md:w-full mt-3 relative">
                    <div class="content absolute bottom-10 left-8">
                        <h2 class=" font-bold text-2xl">Brand Sale</h2>
                        <p class="pb-3">See all and find yours</p>
                        <a href="/category/Brands" class="bg-black font-bold text-white py-3 px-4">SHOP BY BRANDS</a>
                    </div>
                </div>
                <div class="shop-by2 block mx-auto cursor-pointer w-11/12 md:w-full mt-3 relative">
                    <div class="content absolute top-12 left-8">
                        <h2 class=" font-bold text-2xl">Accessories Trends</h2>
                        <p class="pb-3">Browse in all our Accessories</p>
                        <a href="/category/Accessories"
                            class="bg-black font-bold text-white py-3 px-1 block w-11/12 text-center mx-auto mt-3">SHOP BY
                            ACCESSORIES</a>
                    </div>
                </div>
                <div class="shop-by1 block mx-auto cursor-pointer w-11/12 md:w-full mt-3 relative hover:shadow">
                    <div class="content absolute bottom-10 right-8">
                        <h2 class=" font-bold text-2xl">Thrifts Sale</h2>
                        <p class="pb-3">See all and find yours</p>
                        <a href="/category/Thrifts" class="bg-black font-bold text-white py-3 px-4">SHOP BY THRIFTS</a>
                    </div>
                </div>
                <div class="shop-by4 block mx-auto cursor-pointer w-11/12 md:w-full mt-3 relative">
                    <div class="content absolute top-10 left-8">
                        <h2 class=" font-bold text-2xl">Cosmetics Trends</h2>
                        <p class="pb-1">Browse in all our Cosmetics</p>
                        <a href="/category/Cosmetics"
                            class="bg-black font-bold text-white py-3 px-2 block w-11/12 text-center mx-auto mt-2">SHOP BY
                            COSMETICS</a>
                    </div>
                </div>
            </div>
        </div>
        @livewire('index')
        <div id="customerInfo1" class="lined my-16 w-full border border-gray-400 h-0"></div>
        <div id="customerInfo" class="md:flex md:justify-between my-8 w-full md:w-11/12 mx-auto">
            <div class="comp1 md:w-1/4">
                <img src="{{ asset('images/products/home/components/headphones.png') }}" alt=""
                    class="w-10 h-10 mx-auto block">
                <div class="text-center">
                    <h4 class="text-lg pt-2 text-bolder font-bold">Customer Support</h4>
                    <h6 class="text-sm text-bolder text-gray-600 h-7 font-bold">Need Assistance?</h6>
                    <p class="text-gray-500 text-sm p-1">
                        Our help center is always open
                        to our customers. If you have
                        any difficulties, we are here to
                        lend a hand. Message us on our
                        Contact us page. Within 48
                        hours, you will receive a
                        response.
                    </p>
                </div>
            </div>
            <div class="comp1 md:w-1/4">
                <img src="{{ asset('images/products/home/components/credit-card.png') }}" alt=""
                    class="w-10 h-10 mx-auto block">
                <div class="text-center">
                    <h4 class="text-lg pt-2 text-bolder font-bold">SECURED PAYMENT</h4>
                    <h6 class="text-sm text-bolder text-gray-600 h-7 font-bold">Safe & Fast</h6>
                    <p class="text-gray-500 text-sm p-1">
                        Pay using Mobile Money from the comfort of your own home, with no security risks. Only certain
                        regions of the Greater Accra Region can pay securely with cash on delivery.
                    </p>
                </div>
            </div>
            <div class="comp1 md:w-1/4">
                <img src="{{ asset('images/products/home/components/redo-arrow.png') }}" alt=""
                    class="w-10 h-10 mx-auto block">
                <div class="text-center">
                    <h4 class="text-lg pt-2 text-bolder font-bold">FREE RETURNS</h4>
                    <h6 class="text-sm text-bolder text-gray-600 h-7 font-bold">Easy</h6>
                    <p class="text-gray-500 text-sm p-1">
                        Inspect the product for damage
                        or wrongly delivered with the
                        assistance of the delivery agent.
                        Only return if the product is
                        damaged or incorrectly
                        delivered when it arrives.

                    </p>
                </div>
            </div>
            <div class="comp1 md:w-1/4">
                <img src="{{ asset('images/products/home/components/delivery.png') }}" alt=""
                    class="w-10 h-10 mx-auto block">
                <div class="text-center">
                    <h4 class="text-lg pt-2 text-bolder font-bold">DELIVERY LOCATIONS</h4>
                    <h6 class="text-sm text-bolder text-gray-600 h-7 font-bold">Valovov is open to all regions in Ghana.
                    </h6>
                    <p class="text-gray-500 text-sm p-1">
                        Valovov is available in all regions. We deliver throughout Ghana. Now is the time to shop.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('showModal', event => {
            $('#productModel').modal('show');
        })

        jQuery(window).on('scroll', function() {

            var elValFromTop = Math.ceil(jQuery('#animateCategory').offset().top),
                elHeight = jQuery('#animateCategory').outerHeight(),
                windowHeight = jQuery(window).height(),
                windowScrollValFromTop = jQuery(this).scrollTop(),
                headerHeightOffset = jQuery('.fixed-header').outerHeight();

            if ((windowHeight + windowScrollValFromTop) > elValFromTop) {
                $('#animateCategory').addClass('animate__animated animate__backInDown');
            } else {
                $('#animateCategory').removeClass('animate__animated animate__backInDown');
            }
            var elValFromTop1 = Math.ceil(jQuery('#animatedShopby').offset().top),
                elHeight = jQuery('#animatedShopby').outerHeight();

            if ((windowHeight + windowScrollValFromTop) > elValFromTop1) {
                $('#animatedShopby').addClass('animate__animated animate__fadeInLeftBig');
            } else {
                $('#animatedShopby').removeClass('animate__animated animate__fadeInLeftBig');
            }
            /*
            var elValFromTop = Math.ceil(jQuery('#popularProduct').offset().top),
                elHeight = jQuery('#popularProduct').outerHeight();
            if ((windowHeight + windowScrollValFromTop) > elValFromTop) {
                    $('#popularProduct').addClass('animate__animated animate__fadeInRightBig');
            } else {
                $('#popularProduct').removeClass('animate__animated animate__fadeInRightBig');
            }*/

            var elValFromTop2 = Math.ceil(jQuery('#customerInfo1').offset().top),
                elHeight = jQuery('#customerInfo1').outerHeight();
            if ((windowHeight + windowScrollValFromTop) > elValFromTop2) {
                $('#customerInfo').addClass('animate__animated animate__zoomInDown');
            } else {
                $('#customerInfo').removeClass('animate__animated animate__zoomInDown');
            }

        });
    </script>
@endsection
