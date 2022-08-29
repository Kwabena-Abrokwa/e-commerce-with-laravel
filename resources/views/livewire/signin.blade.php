<div class="root">
    <div class="container-margin w-full mx-auto block mt-32">
        <div class="md:flex">
            <div class="wallpaper3 md:w-3/6 md:block hidden p-2 md:border-r-2">
            </div>
            <div class="login my-1 mx-2 md:w-1/2">
                <h2 class="text-center text-xl font-bold">Sign In</h2>
                <form action="" wire:submit.prevent="loginUser">
                    @if (session()->has('error'))
                        <div class="text-red-800 text-center pt-5">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="input mx-auto my-4">
                        <label for="" class="block pl-6">Email</label>
                        <input type="email" wire:model.lazy="email"
                            class="border p-2 shadow outline mx-auto block w-11/12 h-10 focus:outline-none focus:ring focus:border-blue-200 ">
                        <div class="text-red-600 pt-3 pl-6">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="input mx-auto my-4">
                        <label for="" class="block pl-6">Password</label>
                        <input type="password" wire:model.lazy="password"
                            class="border p-2 shadow outline mx-auto block w-11/12 h-10 focus:outline-none focus:ring focus:border-blue-300">
                        <div class="text-red-600 pt-3 pl-6">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="submitBtn mx-auto w-full">
                        <div wire:loading.remove wire:target="loginUser">
                            <button type="submit"
                                class="shadow bg-black text-white w-11/12 mt-8 py-3 px-16 block mx-auto">Sign
                                in</button>
                        </div>
                        <div wire:loading wire:target="loginUser"
                            class="shadow bg-black w-11/12 ml-4 lg:ml-7 my-2 py-2 px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="margin: auto; background: #000000; display: block; shape-rendering: auto;"
                                width="40px" height="40px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <circle cx="50" cy="50" fill="none" stroke="#ffff" stroke-width="4" r="27"
                                    stroke-dasharray="127.23450247038662 44.411500823462205">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                                        dur="1s" values="0 50 50;360 50 50" keyTimes="0;1">
                                    </animateTransform>
                                </circle>
                        </div>
                    </div>
                    <div class="options ">
                        <h4 class="text-center text-lg p-2">Don't have an account yet? <a href="/sign-up">Create your
                                account</a></h4>
                        <h4 class="text-center text-lg p-2">Forgotten Password?</h4>
                    </div>
                </form>
                <div class="login-links hidden lg:flex lg:justify-between">
                    <a href="{{ url('/auth/google/redirect') }}"
                        class="shadow text-white my-3 lg:my-0 py-2 px-16 block mx-auto text-center"
                        style="background-color: orangered;">Login with Google</a>
                    <a href="{{ url('/auth/facebook/redirect') }}"
                        class="shadow text-white my-3 lg:my-0 py-2 px-16 block mx-auto text-center bg-blue-800">Login
                        with Facebook</a>
                </div>
                <div class="login-links lg:hidden">
                    <a href="{{ url('/auth/google/redirect') }}"
                        class="shadow text-white text-center w-11/12 mt-8 py-3 px-16 block mx-auto"
                        style="background-color: orangered;">Login with Google</a>
                    <a href="{{ url('/auth/facebook/redirect') }}"
                        class="shadow text-white text-center w-11/12 mt-8 py-3 px-16 block mx-auto bg-blue-800">Login
                        with Facebook</a>
                </div>
            </div>
        </div>
    </div>
</div>
