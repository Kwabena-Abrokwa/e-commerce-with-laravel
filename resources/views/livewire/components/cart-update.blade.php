<div class="cartbtn lg:flex pr-1 mt-2 md:p-2 lg:mt-0 lg:p-0 lg:justify-around pt-1 cursor-pointer">
    <div class="cart relative">
        <a href="{{route('cart')}}">
            <div class="font-light flex">
                <div class="icon mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                    </svg>
                </div>
                <div
                    class="rounded-full text-center absolute -right-3 -top-1  text-sm  text-white p-1 md:px-2 py-0 bg-red-400 font-bold">
                    {{ $countCart }}</div>
            </div>
        </a>
    </div>
</div>
