<div class="">

    <div class="id">
        <div class="px-2 py-2 hidden lg:block bg-white rounded-md shadow dark-mode:bg-gray-800">
            @guest <div
                    class="flex block w-1/2 px-5 py-2 mt-3 mx-1 text-center text-sm bg-black font-medium text-white leading-5 hover:bg-gray-600 rounded hover:text-white transition-all-500 md:mx-2 md:w-auto">
                    <a class="text-white pr-2" href="/wishlist">Wishlist</a>
                    <div class="rounded-full text-center text-sm  text-white p-1 md:px-2 py-0 bg-red-400 font-bold">
                        {{ $countCart }}</div>
                </div>
                <a class="block w-1/2 px-5 py-2 mt-3 mx-1 text-center text-sm bg-black font-medium text-white leading-5 hover:bg-gray-600 rounded hover:text-black transition-all-500 md:mx-2 md:w-auto"
                    href="/sign-in">Sign In</a>
                <a class="block w-1/2 px-5 py-2 mt-3 mx-1 rounded text-center text-sm bg-yellow-300 font-medium text-black leading-5 md:mx-0 md:w-auto"
                    href="/sign-up">Sign Up</a>
            @endguest
            @auth
    
                <div class="px-2 py-2 dark-mode:bg-gray-800">
                    <a class="block w-1/2 px-5 py-2 mt-3 mx-1 text-center text-sm bg-black font-medium text-white leading-5 hover:bg-gray-400 rounded hover:text-black transition-all-500 md:mx-2 md:w-auto"
                        href="/account">Account</a>
                    <div
                        class="flex block w-1/2 px-5 py-2 mt-3 mx-1 text-center text-sm bg-black font-medium text-white leading-5 hover:bg-gray-600 rounded hover:text-white transition-all-500 md:mx-2 md:w-auto">
                        <a class="text-white pr-2" href="/wishlist">Wishlist</a>
                        <div class="rounded-full text-center text-sm  text-white p-1 md:px-2 py-0 bg-red-400 font-bold">
                            {{ $countCart }}</div>
                    </div>
                    <a class="block w-1/2 px-5 py-2 mt-3 mx-1 rounded text-center text-sm bg-red-600 font-medium text-white leading-5 hover:bg-red-400 md:mx-0 md:w-auto"
                        href="/logout">Logout</a>
                </div>
            @endauth
        </div>
    </div>
    <div class="mobile lg:hidden">
        @guest
            <div class="flex items-center py-2 mt-2">
                <a class="block w-1/2 py-2 mx-1 text-center text-sm bg-white font-medium text-black rounded"
                    href="/sign-in">Sign In</a>
                <a class="block w-1/2 py-2 mx-1 rounded text-center text-sm bg-yellow-300 font-medium text-black"
                    href="/sign-up">Sign Up</a>
            </div>
            <a class="block w-full py-2 mx-auto rounded text-sm bg-black text-white  hover:bg-white text-center mb-2"
                href="/wishlist">Wishlist <span class="rounded-full text-xs w-2 h-2 p-1 bg-white text-black font-bold">
                    {{ $countCart }}</span></a>
        @endguest
        @auth
            <div class="items-center  py-2 mt-2">
                <a class="block w-full py-2 mx-auto rounded text-sm bg-black text-white hover:bg-white text-center mb-2"
                    href="/wishlist">Wishlist <span class="rounded-full text-xs w-2 h-2 p-1 bg-white text-black font-bold">
                        {{ $countCart }}</span></a>
                <a class="block w-full py-2 mx-auto rounded text-center text-sm bg-red-600  text-white md:mx-0 md:w-auto"
                    href="/logout">Logout</a>
            </div>
        @endauth
    </div>
</div>
