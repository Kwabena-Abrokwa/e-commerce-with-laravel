 <div id="animateCategory" class="categories flex justify-between my-10 overflow-x-scroll xl:overflow-x-hidden">
     <div class="category-2 mr-0 xl:mr-0">
         <a href="/category/Accessories">
            <img src=" {{ asset('images/products/home/4.jpg') }} " alt=""
            class="xl:w-48 w-40 h-40 xl:h-48 hover:shadow-xl">
        <h6 class="font-bold pt-3">ACCESSORIES</h6>
        <p class="text-xs">{{$accessories}} ITEMS</p>
        <div class="text-center font-bold text-xl py-3 w-44  xl:hidden"></div>
        </a>
     </div>
     <div class="category-1 mr-0 xl:mr-0">
        <a href="/category/Brands">
         <img src=" {{ asset('images/products/home/2.jpg') }} " alt=""
             class="xl:w-48 w-40 h-40 xl:h-48 hover:shadow-xl">
         <h6 class="font-bold pt-3">BRANDS</h6>
         <p class="text-xs">{{$brands}} ITEMS</p>
         <div class="text-center font-bold text-xl py-3 w-44  xl:hidden"></div>
        </a>
     </div>
     <div class="category-3 mr-0 xl:mr-0">
        <a href="/category/Cosmetics">
         <img src=" {{ asset('images/products/home/6.jpg') }} " alt=""
             class="xl:w-48 w-40 h-40 xl:h-48 hover:shadow-xl">
         <h6 class="font-bold pt-3">COSMETICS</h6>
         <p class="text-xs">{{$cosmetics}} ITEMS</p>
         <div class="text-center font-bold text-xl py-3 w-44  xl:hidden"></div>
        </a>
     </div>
     @if ($footwears > 1)
     <div class="category-1 mr-0 xl:mr-0">
        <a href="/category/Footwears">
         <img src=" {{ asset('images/products/home/1.jpg') }} " alt=""
             class="xl:w-48 w-40 h-40 xl:h-48 hover:shadow-xl">
         <h6 class="font-bold pt-3">FOOTWEAR</h6>
         <p class="text-xs">{{$footwears}} ITEMS</p>
         <div class="text-center font-bold text-xl py-3 w-44 xl:hidden"></div>
        </a>
     </div>
     @endif
     <div class="category-3 mr-0 xl:mr-0">
        <a href="/category/Thrifts">
         <img src=" {{ asset('images/products/home/5.jpg') }} " alt=""
             class="xl:w-48 w-40 h-40 xl:h-48 hover:shadow-xl">
         <h6 class="font-bold pt-3">THRIFTS</h6>
         <p class="text-xs">{{$thrifts}} ITEMS</p>
         <div class="text-center font-bold text-xl py-3 w-44  xl:hidden"></div>
        </a>
     </div>
     <div class="category-2 mr-0 xl:mr-0">
        <a href="/shop">
         <img src=" {{ asset('images/products/home/3.jpg') }} " alt=""
             class=" xl:w-48 w-40 h-40 xl:h-48 hover:shadow-xl">
         <h6 class="font-bold pt-3">GO TO MAIN SHOP</h6>
         <p class="text-xs">{{$accessories + $brands + $cosmetics + $footwears + $thrifts}} ITEMS</p>
         <div class="text-center font-bold text-xl py-3 w-44  xl:hidden"></div>
        </a>
     </div>
 </div>
