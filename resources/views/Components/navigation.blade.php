<header x-data="{ isOpen: false }" class="shadow-sm fixed bg-white w-screen py-2 md:py-0 mb-10 top-0 z-20"
    id="header-main">
    <nav class="contain m-0 px-4 md:px-2 bg-white ">
        <div class="flex justify-evenly items-center">
            <div class="flex m-0 items-center">
                <!-- Mobile menu button -->
                <div class="mobileMenuButton flex lg:hidden justify-evenly">
                    <button @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="flex  items-center">
                    <a class="text-gray-800 text-xl font-bold hover:text-gray-700" href="/">
                        <img src="{{ asset('images/logo/VN.png') }}" alt="" class="hidden md:block md:w-72 p-2">
                        <img src="{{ asset('images/logo/VN2.png') }}" alt="" class="md:hidden w-16 p-2">
                    </a>
                    <!-- Search input on desktop screen -->
                    <div class="mx-3 w-full lg:block relative h-10">
                        @livewire('components.navsearch')
                    </div>
                </div>
                <div class="block lg:hidden">
                    @livewire('components.cart-update')
                </div>
            </div>
            <div class=" shopBody relative">
                <div class="lg:flex items-center transition-all duration-500 hidden lg:block">
                    <div class="flex justify-evenly">
                        <a id="shopHover"
                            class="my-1 text-sm text-gray-700 font-light xl:pr-3 hover:font-bold hover:text-black"
                            href="/shop">SHOP</a>
                        <a class="womenHover my-1 text-sm text-gray-700 font-light xl:pr-3 hover:font-bold hover:text-black"
                            href="/shop">WOMEN'S WEAR</a>
                        <a class="menHover my-1 text-sm text-gray-700 font-light xl:pr-3 hover:font-bold hover:text-black"
                            href="/shop">MEN'S WEAR</a>
                        <a class="unixHover my-1 lg:hidden xl:block text-sm text-gray-700 font-light xl:pr-3 hover:font-bold hover:text-black"
                            href="/shop">UNISEX'S WEAR</a>
                    </div>
                </div>
                <div class="dropdownShop absolute wallpaper hidden rounded shadow  z-50"
                    style="width:1000px; height:450px; left:-420px; top:70px">
                    <div class=" design">
                        <img src="{{ asset('images/products/shop/banner.png') }}" alt="" srcset=""
                            class="w-full">
                    </div>
                    <div class="header">
                        <h3 class="font-extrabold text-center text-gray-300 py-8">ALL WEARS AND MORE</h3>
                    </div>
                    <div class="links w-5/6 grid grid-cols-6 py-1 mx-auto">
                        <a class="my-1 text-white text-center mb-1" href="/search/Hair accessories">Hair accessories</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Bag">Bag</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Handbag">Handbag</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Bag Pack">Bag Pack</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Hoddies">Hoddies</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Jeans">Jeans</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Tousers">Tousers</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Dress">Dress</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Bangles and Bracelets">Bangles</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Swimsuit">Swimsuit</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Bags">Bags</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Mirror">Mirror</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Skin care">Skin care</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Shoes">Shoes</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Heels">Heels</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Nail polish">Nail polish</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Suit">Suit</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Bangles and Bracelets">Bracelets</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Shirts">Shirts</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Skirt">Skirts</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Jackets">Jackets</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Handbags">Handbags</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Pants">Pants</a>
                        <a class="my-1 text-white text-center mb-1" href="/search/Joggers">Joggers</a>
                    </div>
                </div>
                <div class="dropdownWomen absolute wallpaper hidden rounded shadow  z-50"
                    style="width:1000px; height:450px; left:-420px; top:70px">
                    <div class=" design">
                        <img src="{{ asset('images/products/shop/banner.png') }}" alt="" srcset=""
                            class="w-full">
                    </div>
                    <div class="header">
                        <h3 class="font-extrabold text-center text-gray-300 py-8">WOMEN'S WEAR</h3>
                    </div>
                    <div class="links w-5/6 grid grid-cols-5 py-1 mx-auto">
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Hair accessories">Hair accessories</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Bag">Bag</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Handbag">Handbag</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Bag Pack">Bag Pack</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Jeans">Jeans</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Hoodie">Hoodie</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Skirt">Skirt</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Joggers">Joggers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Tousers">Tousers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Dress">Dress</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Bangles and Bracelets">Bangles</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Swimsuit">Swimsuit</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Shirt">Shirt</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Suit">Suit</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Mirror">Mirror</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Nail polish"> Nail polish</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Skin care">Skin care</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Bangles and Bracelets">Bracelets</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Makeup">Makeup</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Women's Wear/Pomade">Pomade</a>
                    </div>
                </div>
                <div class="dropdownMen absolute wallpaper hidden rounded shadow  z-50"
                    style="width:1000px; height:450px; left:-420px; top:70px">
                    <div class=" design">
                        <img src="{{ asset('images/products/shop/banner.png') }}" alt="" srcset=""
                            class="w-full">
                    </div>
                    <div class="header">
                        <h3 class="font-extrabold text-center text-gray-300 py-8">MEN'S WEAR</h3>
                    </div>
                    <div class="links w-5/6 grid grid-cols-5 py-1 mx-auto">
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Chain">Chains</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Cap">Caps</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Jeans">Jeans</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Hoddie">Hoddies</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Sock">Socks</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Bag">Bags</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Tousers">Tousers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Skin care">Skin care</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Pomade">Pomade</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Short">Shorts</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Suit">Suit</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Hat">Hats</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Shirt">Shirts</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Jacket">Jackets</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Boxer">Boxers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Joggers">Joggers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Sneaker">Sneakers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Watch">Watch</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Slipper">Slippers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Men's Wear/Singlet">Singlet</a>
                    </div>
                </div>
                <div class="dropdownUnix absolute wallpaper hidden rounded shadow  z-50"
                    style="width:1000px; height:450px; left:-420px; top:70px">
                    <div class=" design">
                        <img src="{{ asset('images/products/shop/banner.png') }}" alt="" srcset=""
                            class="w-full">
                    </div>
                    <div class="header">
                        <h3 class="font-extrabold text-center text-gray-300 py-8">UNISEX'S WEAR</h3>
                    </div>
                    <div class="links w-5/6 grid grid-cols-5 py-1 mx-auto">
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Hair accessories">Hair accessories</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Bag">Bag</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Handbag">Handbag</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Bag Pack">Bag Pack</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Jeans">Jeans</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Rings">Rings</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Scaff">Scaff</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Bags">Bags</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Shoes">Shoes</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Hoodie">Hoodie</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Shorts">Shorts</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Hats">Hats</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Shirts">Shirts</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Joggers">Joggers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Jackets">Jackets</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Bags">Bags</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Sneakers">Sneakers</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Slipper">Slipper</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Makeup">Makeup</a>
                        <a class="my-1 text-white text-center mb-1" href="/type/Unisex Wear/Pomade">Pomade</a>
                    </div>
                </div>
            </div>
            <div @click.away="open = false" class="relative border-b rounded hidden lg:block" x-data="{ open: false }">
                <div class="contain whitespace-nowrap overflow-x-hidden">
                    <div class="flex justify-evenly py-2 px-1 ">
                        @guest

                            <div class="icon my-auto pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </div>
                        @endguest
                        @auth
                            @if (Auth::user()->profile == '')
                                <div class="icon my-auto pr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </div>
                            @else
                                <div class="icon my-auto pr-2">
                                    <img src="{{ Auth::user()->profile }}" alt="" srcset="" class="w-10 rounded-full">
                                </div>
                            @endif
                        @endauth
                        <button @click="open = !open"
                            class="my-1 text-sm text-gray-700 font-light hover:font-bold hover:text-black xl:pr-3">
                            @guest
                                <span class="text-md">ACCOUNTS</span>
                            @endguest
                            @auth
                                <span class="text-md">{{ Auth::user()->name }}</span>
                            @endauth
                        </button>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-50"
                        id="dropdown">
                        @livewire('components.nav-wishlist')
                    </div>
                </div>

            </div>
            <div class="hidden lg:block">
                @livewire('components.cart-update')
            </div>
            <div class="cat-bg w-0 h-screen overflow-hidden fixed top-0 left-0 z-50 overflow-y-scroll">
                <nav class="category-nav w-full h-screen overflow-hidden bg-black relative">
                    <div class="closeBtn icons absolute right-2 top-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                            class="bi bi-x" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                    <h1 class="text-center text-white font-bold mt-4">Valovov</h1>

                    <a href="/account">
                        @auth
                            <div class="flex align-center mt-3 w-5/6 mx-auto">
                                <div class="icon my-auto pr-2">
                                    @if (Auth::user()->profile == '')
                                        <div class="icon my-auto pr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="White"
                                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="icon my-auto pr-2">
                                            <img src="{{ Auth::user()->profile }}" alt="" srcset=""
                                                class="w-12 rounded-full">
                                        </div>
                                    @endif
                                </div>
                                <div class="name">
                                    <h6 class="text-xs text-white">Welcome</h6>
                                    <h6 class="text-xs text-white">{{ Auth::user()->name }}</h6>
                                </div>
                            </div>
                        @endauth
                    </a>
                    <h6 class="text-center text-yellow-400 font-bold text-md mt-4">Categories</h6>
                    <div class="cat w-11/12 block mx-auto ">
                        <!-- Dashboards links -->
                        <div class="mt-4" x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                            <a href="/category/Accessories"
                            class="flex items-center p-2 transition-colors rounded-md bg-white">
                                <span class="ml-2 text-sm "> ACCESSORIES </span>
                            </a>
                        </div>
                        <div class="mt-4" x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                            <a href="/category/Brands" 
                            class="flex items-center p-2 transition-colors rounded-md bg-white">
                                <span class="ml-2 text-sm "> BRANDS </span>
                            </a>
                        </div>
                        <div class="mt-4" x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                            <a href="/category/Cosmetics" 
                            class="flex items-center p-2 transition-colors rounded-md bg-white">
                                <span class="ml-2 text-sm "> COSMETICS </span>
                            </a>
                        </div>
                        <div class="mt-4" x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                            <a href="/category/Thrifts"
                            class="flex items-center p-2 transition-colors rounded-md bg-white">
                                <span class="ml-2 text-sm "> THRIFTS </span>
                            </a>
                        </div>
                        <h6 class="text-center text-yellow-400 font-bold text-md mt-2">Quick Links</h6>
                        <div class="flex items-center py-1 justify-around mt-1">
                            <a class="block mx-1 text-sm font-medium text-white" href="/">Home</a>
                            <a class="block mx-1 text-sm font-medium text-white" href="/shop">Shop</a>
                        </div>
                        <div class="flex items-center py-1 justify-around mt-1">
                            <a class="block mx-1 text-sm font-medium text-white" href="/about-us">About Us</a>
                            <a class="block mx-1 text-sm font-medium text-white " href="/contact-us">Contact Us</a>
                        </div>
                        @livewire('components.nav-wishlist')
                    </div>
            </div>
    </nav>
    </div>
    </nav>
</header>
