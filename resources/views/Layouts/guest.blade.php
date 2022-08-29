<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Search t-shirts, watches, joggers, designer bags, sneakers, cosmetics, accessories, brands, footwears and other items for sale. Buy cheap T-shirts, Jeans, Bags, Skirts , Blouses.">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Valovov Shop, Ghana's no.1 online fashion store" />
    <meta property="og:description"
        content="Shop t-shirts, watches, joggers, designer bags, and other items for sale. Buy cheap T- shirts, Jeans, Bags, Skirts , Blouses." />
    <meta property="og:image"
        content="https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg" />
    <meta property="og:url" content="https://www.valovov.com/shop" />
    <meta property="og:site_name" content="https://www.valovov.com/" />
    <link rel="canonical" href="https://valovov.com/" />

    <link rel="shortcut icon" href=" {{ asset('images/logo/VN2.png') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="alternate" href="https://www.valovov.com/" hreflang="en" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('Components.googleanalytics')
    <title>Search t-shirts, watches, joggers, designer bags, sneakers, cosmetics, accessories, brands, footwears and
        other items for sale. Buy cheap T-shirts, Jeans, Bags, Skirts , Blouses.</title>
</head>
@livewireStyles
@livewireScripts
<style>*{margin:0;padding:0;box-sizing:border-box;scroll-behavior:smooth}.shop-loader{background:#ffffffce}.contain-dashboardHome{background-color:#d1d1d1}.deleteloader{background-color:#ffffffd2}a,body,button,h1,h2,h3,h4,h5,h6,input,p{font-family:Poppins,sans-serif}a,li{color:#000;text-decoration:none}.account-settings{background:#f3f3f3}.wallpaper{background:linear-gradient(#000000d8,#000000d8),url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.wallpaper1{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl1.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.wallpaper2{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl0.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.wallpaper3{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/wl2.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.banner1{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/banner+01.png);background-repeat:no-repeat;background-position:center;background-size:cover}.banner2{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/banner+02.png);background-repeat:no-repeat;background-position:center;background-size:cover}.pop-up{background:#0000008e}.category-nav{background:linear-gradient(#000000b2,#000000b2),url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/w1.jpg);background-position:center;background-repeat:no-repeat;background-size:cover}.shop-by1{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/w0.jpg);background-position:center;background-repeat:no-repeat}.shop-by2{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/w3.jpg);background-position:center;background-repeat:no-repeat}.shop-by3{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/w2.jpg);background-position:center;background-repeat:no-repeat}.shop-by4{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/w4.jpg);background-position:center;background-repeat:no-repeat}.img-responsive{height:600px}.shop-by1,.shop-by2,.shop-by3,.shop-by4{background-size:contain;height:450px}#animateCategory{animation-delay:.2s;animation-duration:.8s}#customerInfo{animation-duration:1.5s}#animatedShopby{animation-delay:.3s;animation-duration:1s}.iconAnimateProcess{animation-duration:1.2s;animation-iteration-count:infinite}@media only screen and (max-width:1060px){.shop-by1,.shop-by2,.shop-by3,.shop-by4{background-size:cover;height:400px}.img-responsive{height:500px}}@media only screen and (max-width:430px){.wallpaper1{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/phone-w1.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.wallpaper2{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/phone-w2.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.wallpaper3{background:url(https://valovov-images-container.s3.af-south-1.amazonaws.com/wallpapers/phone-w3.jpg);background-repeat:no-repeat;background-position:center;background-size:cover}.shop-by1,.shop-by2,.shop-by3,.shop-by4{background-size:cover;height:500px}.img-responsive{height:450px}}</style>

<body>
    <main>
        @include('Components.navigation')
        {{ $slot }}
        @include('Components.footer')
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
 window.addEventListener('showModal',event=>{$('#productModel').modal('show')})
let boxWidth='100vw';$('.mobileMenuButton').on('click',function(){$('.cat-bg').animate({width:boxWidth})})
$('.closeBtn').on('click',function(){$('.cat-bg').animate({width:0})})
let boxWidth2='100vw';$('.cartbtn').on('click',function(){$('.cart-bg').animate({width:'320px'})})
$('.closeBtn2').on('click',function(){$('.cart-bg').animate({width:0})})
$('#shopHover').on('mouseover',function(){$('.dropdownShop').show();$('.dropdownUnix').hide();$('.dropdownWomen').hide();$('.dropdownMen').hide()})
$('.dropdownShop').on('mouseover',function(){$('.dropdownShop').show()})
$('.dropdownShop').on('mouseout',function(){$('.dropdownShop').hide()})
$('.womenHover').on('mouseover',function(){$('.dropdownWomen').show();$('.dropdownUnix').hide();$('.dropdownShop').hide();$('.dropdownMen').hide()})
$('.dropdownWomen').on('mouseover',function(){$('.dropdownWomen').show()})
$('.dropdownWomen').on('mouseout',function(){$('.dropdownWomen').hide()})
$('.menHover').on('mouseover',function(){$('.dropdownMen').show();$('.dropdownUnix').hide();$('.dropdownShop').hide();$('.dropdownWomen').hide()})
$('.dropdownMen').on('mouseover',function(){$('.dropdownMen').show()})
$('.dropdownMen').on('mouseout',function(){$('.dropdownMen').hide()})
$('.unixHover').on('mouseover',function(){$('.dropdownUnix').show();$('.dropdownShop').hide();$('.dropdownWomen').hide()})
$('.dropdownUnix').on('mouseover',function(){$('.dropdownUnix').show()})
$('.dropdownUnix').on('mouseout',function(){$('.dropdownUnix').hide()})
$('.filters-btn').on('click',function(){$('.filters').animate({width:'340px'})})
$('.closeBtn').on('click',function(){$('.filters').animate({width:0})})
</script>

</html>
