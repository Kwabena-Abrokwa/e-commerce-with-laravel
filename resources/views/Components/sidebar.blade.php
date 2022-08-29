<div class="sidebar w-1/4 hidden lg:block">
    <nav aria-label="Main" class=" px-2 overflow-y-hidden w-full">
        <!-- Dashboards links -->

        <div x-data="{ isActive: false, open: true}">
            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
            <a href="#" @click="$event.preventDefault(); open = !open"
                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'true'">
                <span class="ml-2 text-sm"> THRIFTS </span>
                <span class="ml-auto " aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 z-10 transition-transform transform" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </a>
            <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a href="/filter/Thrifts/Bag" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Bag
                </a>
                <a href="/filter/Thrifts/T-shirt" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Shirt
                </a>
                <a href="/filter/Thrifts/Handbag" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Handbag
                </a>
                <a href="/filter/Thrifts/Bag Pack" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Bag Pack
                </a>
                <a href="/filter/Thrifts/Jeans" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Jeans
                </a>
                <a href="/filter/Thrifts/Sweatpants" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Sweatpants
                </a>
                <a href="/filter/Thrifts/Hoodie" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Hoodie
                </a>
                <a href="/filter/Thrifts/Skirt" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Skirt
                </a>
                <a href="/filter/Thrifts/Joggers" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Joggers
                </a>
                <a href="/filter/Thrifts/Trousers" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Trousers
                </a>
                <a href="/filter/Thrifts/Dress" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Dress
                </a>
            </div>
        </div>
        <div x-data="{ isActive: false, open: false}">
            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
            <a href="#" @click="$event.preventDefault(); open = !open"
                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'true'">
                <span class="ml-2 text-sm"> ACCESSORIES </span>
                <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </a>
            <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a href="/filter/Accessories/Hair accessories" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Hair accessories
                </a>
                <a href="/filter/Accessories/Bangles and Bracelets" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Bangles and Bracelets
                </a>
            </div>
        </div>
        <div x-data="{ isActive: false, open: false}">
            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
            <a href="#" @click="$event.preventDefault(); open = !open"
                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'true'">
                <span class="ml-2 text-sm">BRANDS</span>
                <span class="ml-auto " aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 z-10 transition-transform transform" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </a>
            <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a href="/filter/Brands/Bag" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Bag
                </a>
                <a href="/filter/Brands/Swimsuit" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Swimsuit
                </a>
                <a href="/filter/Brands/Shirt" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Shirt
                </a>
                <a href="/filter/Brands/Suit" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Suit
                </a>
                <a href="/filter/Brands/Dress" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Dress
                </a>
            </div>
        </div>
        <div x-data="{ isActive: false, open: false}">
            <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
            <a href="#" @click="$event.preventDefault(); open = !open"
                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'true'">
                <span class="ml-2 text-sm"> COSMETICS </span>
                <span class="ml-auto " aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 z-10 transition-transform transform" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </a>
            <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a href="/filter/Cosmetics/Mirror" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Mirror
                </a>
                <a href="/filter/Cosmetics/Nail polish" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Nail polish
                </a>
                <a href="/filter/Cosmetics/Skin care" role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Skin care
                </a>
            </div>
        </div>
    </nav>
</div>

<div class="filters w-0 h-screen overflow-hidden fixed top-0 right-0 z-50">
    <nav class="h-screen overflow-hidden bg-black">
        <div class="closeBtn icons absolute left-2 top-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-x"
                viewBox="0 0 16 16">
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>
        <h1 class="text-center text-white p-8">FILTERS</h1>
        <div class="cat w-11/12 block mx-auto">
            <!-- Dashboards links -->
            <div x-data="{ isActive: false, open: true}" class="my-2">
                <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 transition-colors rounded-md bg-white" :class="{'': isActive || open}"
                    role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'true'">
                    <span class="ml-2 text-sm ">THRIFTS</span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="/filter/Thrifts/Bag" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Bag
                    </a>
                    <a href="/filter/Thrifts/T-shirt" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Shirt
                    </a>
                    <a href="/filter/Thrifts/Handbag" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Handbag
                    </a>
                    <a href="/filter/Thrifts/Bag Pack" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Bag Pack
                    </a>
                    <a href="/filter/Thrifts/Jeans" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Jeans
                    </a>
                    <a href="/filter/Thrifts/Sweatpants" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Sweatpants
                    </a>
                    <a href="/filter/Thrifts/Hoodie" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Hoodie
                    </a>
                    <a href="/filter/Thrifts/Skirt" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Skirt
                    </a>
                    <a href="/filter/Thrifts/Joggers" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Joggers
                    </a>
                    <a href="/filter/Thrifts/Trousers" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Trousers
                    </a>
                    <a href="/filter/Thrifts/Dress" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Dress
                    </a>
                </div>
            </div>
            <!-- Dashboards links -->
            <div x-data="{ isActive: false, open: false}" class="my-2">
                <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md bg-white"
                    :class="{'': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'true'">
                    <span class="ml-2 text-sm "> ACCESSORIES </span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="/filter/Accessories/Hair accessories" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Hair accessories
                    </a>
                    <a href="/filter/Accessories/Bangles and Bracelets" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Bangles and Bracelets
                    </a>
                </div>
            </div>
            <div x-data="{ isActive: false, open: false}" class="my-2">
                <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md bg-white"
                    :class="{'': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'true'">
                    <span class="ml-2 text-sm "> BRANDS </span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="/filter/Brands/Bag" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Bag
                    </a>
                    <a href="/filter/Brands/Swimsuit" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Swimsuit
                    </a>
                    <a href="/filter/Brands/Shirt" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Shirt
                    </a>
                    <a href="/filter/Brands/Suit" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Suit
                    </a>
                    <a href="/filter/Brands/Dress" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Dress
                    </a>
                </div>
            </div>
            <div x-data="{ isActive: false, open: false}" class="my-2">
                <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md bg-white"
                    :class="{'': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'true'">
                    <span class="ml-2 text-sm "> COSMETICS </span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-1 space-y-2 px-7" aria-label="Dashboards">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="/filter/Cosmetics/Mirror" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Mirror
                    </a>
                    <a href="/filter/Cosmetics/Nail polish" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Nail polish
                    </a>
                    <a href="/filter/Cosmetics/Skin care" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Skin care
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
