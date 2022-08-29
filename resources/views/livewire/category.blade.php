<div class="id">
    <div class="loader w-screen left-0 top-0 h-screen shop-loader fixed z-50" wire:loading wire:target="orderedBy">
        <div class="icon my-60 block">
            <svg xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            style="margin: auto; background: #dad8d800; display: block; shape-rendering: auto;"
            width="56px" height="56px" viewBox="0 0 100 100"
            preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                stroke-dasharray="127.23450247038662 44.411500823462205">
                <animateTransform attributeName="transform" type="rotate"
                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                    keyTimes="0;1">
                </animateTransform>
            </circle>
        </div>
    </div>
    <div class="loader w-screen left-0 top-0 h-screen shop-loader fixed z-50" wire:loading wire:target="arrange" >
        <div class="icon my-60 block">
            <svg xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            style="margin: auto; background: #dad8d800; display: block; shape-rendering: auto;"
            width="56px" height="56px" viewBox="0 0 100 100"
            preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                stroke-dasharray="127.23450247038662 44.411500823462205">
                <animateTransform attributeName="transform" type="rotate"
                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                    keyTimes="0;1">
                </animateTransform>
            </circle>
        </div>
    </div>
    <div class="loader w-screen left-0 top-0 h-screen shop-loader fixed z-50" wire:loading wire:target="viewNumber">
        <div class="icon my-60 block">
            <svg xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            style="margin: auto; background: #dad8d800; display: block; shape-rendering: auto;"
            width="56px" height="56px" viewBox="0 0 100 100"
            preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                stroke-dasharray="127.23450247038662 44.411500823462205">
                <animateTransform attributeName="transform" type="rotate"
                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                    keyTimes="0;1">
                </animateTransform>
            </circle>
        </div>
    </div>
    <div class="loader w-screen left-0 top-0 h-screen shop-loader fixed z-50" wire:loading wire:target="pages">
        <div class="icon my-60 block">
            <svg xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            style="margin: auto; background: #dad8d800; display: block; shape-rendering: auto;"
            width="56px" height="56px" viewBox="0 0 100 100"
            preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="4" r="27"
                stroke-dasharray="127.23450247038662 44.411500823462205">
                <animateTransform attributeName="transform" type="rotate"
                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                    keyTimes="0;1">
                </animateTransform>
            </circle>
        </div>
    </div>
    <div class="block">
        <div class="sort mt-1 mx-2 p-3 flex justify-between  bg-gray-100 md:bg-white">
            <div class="sort ">
                <label for="" class="hidden md:block">SORT BY:</label>
                <select wire:model.debounce.500ms="orderedBy"
                    class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                    <option value="name">SORT BY NAME</option>
                    <option value="created_at">SORT BY LATEST</option>
                    <option value="price">SORT BY PRICE : LOW TO HIGH</option>
                </select>
            </div>
            <div class="arrange hidden md:block ">
                <label for="" class="hidden md:block">ARRANGE:</label>
                <select wire:model.debounce.500ms="arrange"
                    class="border-2 border-black  md:w-full h-9 shadow px-2 bg-white text-sm">
                    <option value="1">ASSCENDING</option>
                    <option value="0">DESCENDING</option>
                </select>
            </div>
            <div class="view ml-2 md:ml-0">
                <label for="" class="hidden md:block">VIEW:</label>
                <select wire:model.debounce.500ms="viewNumber"
                    class="border-2 border-black h-9 shadow px-2  md:w-full w-16 bg-white">
                    <option value="30">30</option>
                    <option value="45">45</option>
                    <option value="60">60</option>
                </select>
            </div>
            <div class="sort md:hidden">
                <button class="filters-btn shadow h-9 px-2 bg-white text-sm border-black border-2">FILTERS</button>
            </div>
        </div>
        @if (session()->has('wishlist'))
            <div class="fixed bottom-0 left-0 w-full z-50">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6 class="text-center"> {{ session('wishlist') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div
            class="categories grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 justify-between my-2 w-11/12 block mx-auto">
            @foreach ($products as $product)
                @if ($product->total_quantity > 0)
                    <div class="relative">
                        <div wire:loading.remove wire:target="addWishlist({{ $product->id }})"
                            wire:click="addWishlist({{ $product->id }})" class="absolute right-3"
                            style="bottom:120px">
                            <div class="icon cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </div>

                        </div>
                        <div wire:loading wire:target="addWishlist({{ $product->id }})" class="absolute right-3 "
                            style="bottom:120px">
                            <div class="icon cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                    class="bi bi-heart-fill  animate-pulse" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                </svg>
                            </div>
                        </div>
                        <div class="category-1 hover:shadow-xl p-2 w-full mt-8 xl:mr-0">
                            @if ($product->category == 'Accessories')
                                <img src=" {{ Storage::disk('s3')->url($product->product_accessories->image1) }}  "
                                    alt="" class="xl:w-48 md:w-60 md:h-60 xl:h-48 w-52 h-44 mx-auto">
                            @elseif($product->category == 'Brands')
                                <img src="  {{ Storage::disk('s3')->url($product->product_brands->image1) }}  " alt=""
                                    class="xl:w-48 md:w-60 md:h-60 xl:h-48 w-52 h-44 mx-auto">
                            @elseif($product->category == 'Cosmetics')
                                <img src=" {{ Storage::disk('s3')->url($product->product_cosmetics->image1) }} "
                                    alt="" class="xl:w-48 md:w-60 md:h-60 xl:h-48 w-52 h-44 mx-auto">
                            @elseif($product->category == 'Footwears')
                                <img src=" {{ Storage::disk('s3')->url($product->product_footwear->image1) }}  "
                                    alt="" class="xl:w-48 md:w-60 md:h-60 xl:h-48 w-52 h-44 mx-auto">
                            @elseif($product->category == 'Thrifts')
                                <img src=" {{ Storage::disk('s3')->url($product->product_thrifts->image1) }}  " alt=""
                                    class="xl:w-48 md:w-60 md:h-60 xl:h-48 w-52 h-44 mx-auto">
                            @endif
                            <div class="flex justify-between items-center mt-2">
                                <h6 class="text-xs pl-1 text-gray-400">{{ $product->category }}</h6>
                                <h6 class="text-xs pr-1 text-gray-400">{{ $product->gender_target }}</h6>
                            </div>
                            <h6 class="text-sm pl-2 text-gray-600 overflow-hidden w-10/12 whitespace-nowrap">{{ $product->name }}</h6>
                            <h6><strike class="text-gray-400 pl-2 text-xs">Ghc {{ $product->scrap_price }}</strike>
                            </h6>
                            <h5 class="font-bold text-sm pl-2 ">Ghc {{ $product->price }}</h5>
                            <div class="mx-auto w-full px-2">
                                <div class="btnPreview">
                                    <button wire:loading.remove wire:target="productPreview({{ $product->id }})"
                                        class="btn btn-dark w-full mx-auto mb-2 text-sm"
                                        wire:click="productPreview({{ $product->id }})">View product</button>
                                    <a wire:loading wire:target="productPreview({{ $product->id }})"
                                        class="btn btn-dark w-full mx-auto mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            style="margin: auto; background: #1f1f1fa2; display: block; shape-rendering: auto;"
                                            width="28px" height="28px" viewBox="0 0 100 100"
                                            preserveAspectRatio="xMidYMid">
                                            <circle cx="50" cy="50" fill="none" stroke="#ffff" stroke-width="4" r="27"
                                                stroke-dasharray="127.23450247038662 44.411500823462205">
                                                <animateTransform attributeName="transform" type="rotate"
                                                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                                                    keyTimes="0;1">
                                                </animateTransform>
                                            </circle>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="paginated-pages p-2">
            <a href="#" wire:click='pages' class="pagination-class"> {{ $products->links() }}</a>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self id="productModel" class="modal fade " id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Valovov</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    @if ($previewCount > 0)
                        @foreach ($preview as $product)
                            <div class="lg:flex lg:justify-around overflow-y-scroll">
                                <div class="contained-img w-full mx-auto block ">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators mt-4">
                                            <div data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                                class="active " aria-current="true" aria-label="Slide 1"
                                                style="width:110px">
                                                @if ($product->category == 'Accessories')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_accessories->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Brands')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_brands->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Cosmetics')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Thrifts')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Footwears')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                            <div type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" class='' aria-label="Slide 2" style="width:110px">
                                                @if ($product->category == 'Accessories')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_accessories->image2) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Brands')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_brands->image2) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Cosmetics')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image2) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Thrifts')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image2) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Footwears')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                            <div type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="2" class=' h-28' aria-label="Slide 3"
                                                style="width:110px">
                                                @if ($product->category == 'Accessories')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_accessories->image3) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Brands')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_brands->image3) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Cosmetics')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image3) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Thrifts')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image3) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Footwears')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                                        class="w-full lg:h-28" alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                @if ($product->category == 'Accessories')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_accessories->image1) }}"
                                                        class=" w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Brands')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_brands->image1) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Cosmetics')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image1) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Thrifts')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image1) }}"
                                                        class=" w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Footwears')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                            <div class="carousel-item">
                                                @if ($product->category == 'Accessories')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_accessories->image2) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Brands')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_brands->image2) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Cosmetics')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image2) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Thrifts')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image2) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Footwears')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                            <div class="carousel-item">
                                                @if ($product->category == 'Accessories')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_accessories->image3) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Brands')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_brands->image3) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Cosmetics')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_cosmetics->image3) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Thrifts')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_thrifts->image3) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @elseif ($product->category == 'Footwears')
                                                    <img src="{{ Storage::disk('s3')->url($product->product_footwear->image1) }}"
                                                        class="w-full lg:w-5/6 mx-auto p-4"
                                                        alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="writings mt-20 lg:mt-0 lg:w-1/2 p-4">
                                    <div class="product-name">
                                        <h2 class="text-3xl font-bold py-2">{{ $product->name }}</h2>
                                    </div>
                                    <div class="strike">
                                        @if ($product->scrap_price > 0)
                                            <h3 class="text-lg text-gray-400 font-bold py-1"><strike>₵
                                                    {{ $product->scrap_price }}</strike></h3>
                                        @endif
                                    </div>
                                    <div class="product-price">
                                        <h3 class="text-xl font-bold py-2">Gh₵ {{ $product->price }}</h3>
                                    </div>
                                    <div class="category ">
                                        <p class="text-md py-1">CATEGORY: <span
                                                class="font-bold">{{ $product->category }}</span></p>
                                    </div>
                                    @if (Cart::instance('shopping')->content()->count() > 0 &&
    $findCartProduct->id == $product->id)
                                        <div class="line-top border-t-2"></div>
                                        <button class="btn btn-dark py-2 my-2 text-white w-full" disabled>IN CART
                                        </button>
                                        <div class="options lg:flex justify-between">
                                            <div class="hidden lg:block">
                                                <button class="btn btn-primary" data-bs-dismiss="modal">Continue
                                                    Shopping </button>
                                            </div>
                                            <div class="hidden lg:block">
                                                <a href='{{route('cart')}}' class="btn btn-dark ">Go to Cart</a>
                                            </div>
                                            <div class="w-full  lg:hidden mb-2">
                                                <button class="btn btn-primary w-full" data-bs-dismiss="modal">Continue
                                                    Shopping </button>
                                            </div>
                                            <div class="w-full  lg:hidden">
                                                <a href='{{route('cart')}}' class="btn btn-dark w-full">Go to Cart</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="line-top border-t-2"></div>
                                        @if ($product->category != 'Cosmetics')
                                            <div class="message">
                                                <div class="line-top border-t-2"></div>
                                                <p class="text-md py-1">Select color to display available sizes
                                                </p>
                                            </div>
                                            <div class="selections flex justify-between">
                                                <div class="color">
                                                    <select name="" id="" wire:model.lazy="productColor"
                                                        class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                        @if ($product->category == 'Accessories')
                                                            <option value="">Color</option>
                                                            <option
                                                                value="{{ $product->product_accessories->color }}">
                                                                {{ $product->product_accessories->color }}
                                                            </option>
                                                        @elseif ($product->category == 'Brands')
                                                            <option value="">Color</option>
                                                            <option value="{{ $product->product_brands->color1 }}">
                                                                {{ $product->product_brands->color1 }}
                                                            </option>
                                                            <option value="{{ $product->product_brands->color2 }}">
                                                                {{ $product->product_brands->color2 }}
                                                            </option>
                                                            <option value="{{ $product->product_brands->color3 }}">
                                                                {{ $product->product_brands->color3 }}
                                                            </option>
                                                        @elseif ($product->category == 'Footwears')
                                                            <option value="">Color</option>
                                                            <option value="{{ $product->product_footwear->color1 }}">
                                                                {{ $product->product_footwear->color1 }}
                                                            </option>
                                                            <option value="{{ $product->product_footwear->color2 }}">
                                                                {{ $product->product_footwear->color2 }}
                                                            </option>
                                                            <option value="{{ $product->product_footwear->color3 }}">
                                                                {{ $product->product_footwear->color3 }}
                                                            </option>
                                                        @elseif ($product->category == 'Thrifts')
                                                            <option value="">Color</option>
                                                            <option value="{{ $product->product_thrifts->color }}">
                                                                {{ $product->product_thrifts->color }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="size">
                                                    @if ($product->category == 'Accessories')
                                                        <select name="" id="" wire:model.lazy="productSize"
                                                            class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                            <option value="">Size</option>
                                                            <option
                                                                value="{{ $product->product_accessories->size }}">
                                                                {{ $product->product_accessories->size }}
                                                            </option>
                                                        </select>
                                                    @elseif ($product->category == 'Brands')
                                                        @if ($productColor == $product->product_brands->color1)
                                                            <select name="" id="" wire:model.lazy="productSize"
                                                                class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                                <option value="">Size</option>
                                                                @if ($product->product_brands->quantity1_sm > 0)
                                                                    <option value="Small">Small</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity1_md > 0)
                                                                    <option value="Medium">Medium</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity1_lg > 0)
                                                                    <option value="Large">Large</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity1_xl > 0)
                                                                    <option value="Xtra Large">Xtra Large</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity1_xxl > 0)
                                                                    <option value="X Xtra Large">Xtra Xtra Large
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        @elseif ($productColor ==
                                                            $product->product_brands->color2)
                                                            <select name="" id="" wire:model.lazy="productSize"
                                                                class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                                <option value="">Size</option>
                                                                @if ($product->product_brands->quantity2_sm > 0)
                                                                    <option value="Small">Small</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity2_md > 0)
                                                                    <option value="Medium">Medium</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity2_lg > 0)
                                                                    <option value="Large">Large</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity2_xl > 0)
                                                                    <option value="Xtra Large">Xtra Large</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity2_xxl > 0)
                                                                    <option value="X Xtra Large">Xtra Xtra Large
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        @elseif ($productColor ==
                                                            $product->product_brands->color3 )
                                                            <select name="" id="" wire:model.lazy="productSize"
                                                                class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                                <option value="">Size</option>
                                                                @if ($product->product_brands->quantity3_sm > 0)
                                                                    <option value="Small">Small</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_md > 0)
                                                                    <option value="Medium">Medium</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_lg > 0)
                                                                    <option value="Large">Large</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_xl > 0)
                                                                    <option value="Xtra Large">Xtra Large</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_xxl > 0)
                                                                    <option value="X Xtra Large">Xtra Xtra Large
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        @endif
                                                    @elseif ($product->category == 'Footwears')
                                                        @if ($productColor == $product->product_footwear->color1)
                                                            <select name="" id="" wire:model.lazy="productSize"
                                                                class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                                <option value="">Size</option>
                                                                @if ($product->product_footwear->quantity1_35 > 0)
                                                                    <option value="35">35</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_36 > 0)
                                                                    <option value="36">36</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_37 > 0)
                                                                    <option value="37">37</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_38 > 0)
                                                                    <option value="38">38</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_39 > 0)
                                                                    <option value="39">39</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_40 > 0)
                                                                    <option value="40">40</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_41 > 0)
                                                                    <option value="41">41</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_42 > 0)
                                                                    <option value="42">42</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_43 > 0)
                                                                    <option value="43">43</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_44 > 0)
                                                                    <option value="44">44
                                                                    </option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_45 > 0)
                                                                    <option value="45">45</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_46 > 0)
                                                                    <option value="46">46</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_47 > 0)
                                                                    <option value="47">47</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_48 > 0)
                                                                    <option value="48">48</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity1_49 > 0)
                                                                    <option value="49">49</option>
                                                                @endif
                                                            </select>
                                                        @elseif ($productColor ==
                                                            $product->product_footwear->color2)
                                                            <select name="" id="" wire:model.lazy="productSize"
                                                                class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                                <option value="">Size</option>
                                                                @if ($product->product_footwear->quantity2_35 > 0)
                                                                    <option value="35">35</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_36 > 0)
                                                                    <option value="36">36</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_37 > 0)
                                                                    <option value="37">37</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_38 > 0)
                                                                    <option value="38">38</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_39 > 0)
                                                                    <option value="39">39</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_40 > 0)
                                                                    <option value="40">40</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_41 > 0)
                                                                    <option value="41">41</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_42 > 0)
                                                                    <option value="42">42</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_43 > 0)
                                                                    <option value="43">43</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_44 > 0)
                                                                    <option value="44">44</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_45 > 0)
                                                                    <option value="45">45</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_46 > 0)
                                                                    <option value="46">46</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_47 > 0)
                                                                    <option value="47">47</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_48 > 0)
                                                                    <option value="48">48</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity2_49 > 0)
                                                                    <option value="49">49</option>
                                                                @endif
                                                            </select>
                                                        @elseif ($productColor ==
                                                            $product->product_footwear->color3
                                                            )
                                                            <select name="" id="" wire:model.lazy="productSize"
                                                                class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                                <option value="">Size</option>
                                                                @if ($product->product_brands->quantity3_35 > 0)
                                                                    <option value="35">35</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_36 > 0)
                                                                    <option value="36">36</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_37 > 0)
                                                                    <option value="37">37</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_38 > 0)
                                                                    <option value="38">38</option>
                                                                @endif
                                                                @if ($product->product_brands->quantity3_39 > 0)
                                                                    <option value="39">39</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_40 > 0)
                                                                    <option value="40">40</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_41 > 0)
                                                                    <option value="41">41</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_42 > 0)
                                                                    <option value="42">42</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_43 > 0)
                                                                    <option value="43">43</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_44 > 0)
                                                                    <option value="44">44</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_45 > 0)
                                                                    <option value="45">45</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_46 > 0)
                                                                    <option value="46">46</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_47 > 0)
                                                                    <option value="47">47</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_48 > 0)
                                                                    <option value="48">48</option>
                                                                @endif
                                                                @if ($product->product_footwear->quantity3_49 > 0)
                                                                    <option value="49">49</option>
                                                                @endif
                                                            </select>
                                                        @endif
                                                    @elseif ($product->category == 'Thrifts')
                                                        <select name="" id="" wire:model.lazy="productSize"
                                                            class="border-2 border-black shadow h-9 px-1 bg-white w-36 md:w-full text-sm">
                                                            <option value="">Size</option>
                                                            @if ($product->product_thrifts->quantity_sm > 0)
                                                                <option value="Small">Small</option>
                                                            @endif
                                                            @if ($product->product_thrifts->quantity_md > 0)
                                                                <option value="Medium">Medium</option>
                                                            @endif
                                                            @if ($product->product_thrifts->quantity_lg > 0)
                                                                <option value="Large">Large</option>
                                                            @endif
                                                            @if ($product->product_thrifts->quantity_xl > 0)
                                                                <option value="Xtra Large">Xtra Large</option>
                                                            @endif
                                                            @if ($product->product_thrifts->quantity_xxl > 0)
                                                                <option value="X Xtra Large">Xtra Xtra Large
                                                                </option>
                                                            @endif
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        <div class="border-b my-4"></div>
                                        <div class="flex flex-row h-10 rounded-lg relative bg-white mt-1 relative">
                                            <button wire:target="decrement({{ $product->id }})" wire:click="decrement({{ $product->id }})"
                                                class=" bg-white border text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                <span class="m-auto text-2xl font-thin">−</span>
                                            </button>
                                            <input type="text"
                                                class="outline-none focus:outline-none text-center w-full bg-white border font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                value="{{ $quantity }}"></input>
                                            <button  wire:target="increment({{ $product->id }})"  wire:click="increment({{ $product->id }})"
                                                class="bg-white border text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                <span class="m-auto text-2xl font-thin">+</span>
                                            </button>
                                            <div class="w-full mx-auto absolute bg-white z-50 h-10" wire:loading
                                            wire:target="decrement({{ $product->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                style="margin: auto; background: #ffffffbb; display: block; shape-rendering: auto;"
                                                width="36px" height="36px" viewBox="0 0 100 100"
                                                preserveAspectRatio="xMidYMid">
                                                <circle cx="50" cy="50" fill="none" stroke="#000"
                                                    stroke-width="4" r="27"
                                                    stroke-dasharray="127.23450247038662 44.411500823462205">
                                                    <animateTransform attributeName="transform" type="rotate"
                                                        repeatCount="indefinite" dur="1s"
                                                        values="0 50 50;360 50 50" keyTimes="0;1">
                                                    </animateTransform>
                                                </circle>
                                            </div>
                                            <div class="w-full mx-auto absolute z-50 bg-white h-10" wire:loading wire:target="increment({{ $product->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                style="margin: auto; background: #ffffffbb; display: block; shape-rendering: auto;"
                                                width="36px" height="36px" viewBox="0 0 100 100"
                                                preserveAspectRatio="xMidYMid">
                                                <circle cx="50" cy="50" fill="none" stroke="#000"
                                                    stroke-width="4" r="27"
                                                    stroke-dasharray="127.23450247038662 44.411500823462205">
                                                    <animateTransform attributeName="transform" type="rotate"
                                                        repeatCount="indefinite" dur="1s"
                                                        values="0 50 50;360 50 50" keyTimes="0;1">
                                                    </animateTransform>
                                                </circle>
                                            </div>
                                        </div>
                                        <div class="text-red-600 py-1 text-center">
                                            @error('productColor')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="text-red-600 py-1 text-center">
                                            @error('productSize')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        @if (session()->has('error'))
                                            <div class="text-red-600 text-center py-1">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <div class="add-to-cart my-1">
                                            <button class="btn btn-dark py-2 text-white w-full"
                                                wire:click="addToCart({{ $product->id }})" wire:loading.remove
                                                wire:target="addToCart({{ $product->id }})">ADD TO CART</button>
                                            <a href="#" class="btn btn-dark w-full mx-auto " wire:loading
                                                wire:target="addToCart({{ $product->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    style="margin: auto; background: #1f1f1fbb; display: block; shape-rendering: auto;"
                                                    width="36px" height="36px" viewBox="0 0 100 100"
                                                    preserveAspectRatio="xMidYMid">
                                                    <circle cx="50" cy="50" fill="none" stroke="#ffff" stroke-width="4"
                                                        r="27" stroke-dasharray="127.23450247038662 44.411500823462205">
                                                        <animateTransform attributeName="transform" type="rotate"
                                                            repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                                                            keyTimes="0;1">
                                                        </animateTransform>
                                                    </circle>
                                            </a>
                                        </div>
                                    @endif
                                    <div class="border-b my-2"></div>
                                    <ul class="nav nav-tabs mt-8" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                                aria-selected="true">Description</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile" type="button" role="tab"
                                                aria-controls="profile" aria-selected="false">Size Guide</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active p-2" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                        <div class="tab-pane fade p-2" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            @if ($product->size_guide != '')
                                            @if ($product->gender_target == "Men's Wear")
                                            <div class="img">
                                                <img src="{{ asset("images/products/shop/men.jpg") }}"
                                                class="w-80 h-80 mx-auto" alt="{{ $product->name }}">
                                            </div>
                                            @elseif ($product->gender_target == "Women's Wear") 
                                            <div class="img">
                                                <img src="{{ asset("images/products/shop/women.jpg") }}"
                                                class="w-80 h-80 mx-auto" alt="{{ $product->name }}">
                                            </div>
                                            @endif
                                            <p>{{ $product->size_guide }}</p>
                                         
                                            @else 
                                                <h3 class="text-sm">This product has no size guide </h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
