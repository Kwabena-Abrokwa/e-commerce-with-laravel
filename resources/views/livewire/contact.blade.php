<div class="root">
    <div class="container-margin w-full mx-auto block mt-28">
        <div class="md:flex">
            <div class="sidebar md:w-1/2 mt-8 p-2 md:border-r-2">
                <div class="contact-1">
                    <h3 class="text-2xl">Get in touch</h3>
                    <ul>
                        <li>For any shopping difficulties or suggestions as to how we can better your shopping
                            experience.
                        </li>
                        <li>To sell your products as a third party, send us a mail or WhatsApp us on our contact.</li>
                    </ul>
                    <div class="lined my-5 w-11/12 border border-gray-400 h-0"></div>
                </div>
                <div class="contact-2">
                    <h3 class="text-2xl">The Office</h3>
                    <h6>Address: Coconut point junction, (Prampram), Ghana</h6>
                    <h6>Phone:(+233)20 350 5820</h6>
                    <h6>Email: valovovshop@gmail.com</h6>
                    <div class="lined my-5 w-11/12 border border-gray-400 h-0"></div>
                </div>
                <div class="contact-3">
                    <h3 class="text-3xl">Customer Service Hours</h3>
                    <h4>Monday - Saturday 9am to 4pm</h4>
                </div>
            </div>
            <div class="about m-8 md:w-1/2">
                <form action="" wire:submit.prevent="contactUs">
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Fullname</label>
                        <input type="text" wire:model.defer="contactFullname"
                            class="border shadow outline block w-full h-8 focus:outline-none p-2 focus:ring focus:border-blue-200 ">
                    </div>
                    <div class="text-red-600 ">
                        @error('contactFullname')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Email</label>
                        <input type="email"  wire:model.defer="contactEmail"
                            class="border shadow outline block w-full h-8 focus:outline-none focus:ring p-2 focus:border-blue-300">
                    </div>
                    <div class="text-red-600 ">
                        @error('contactEmail')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Phone Number</label>
                        <input type="text"  wire:model.defer="contactPhone"
                            class="border shadow outline block w-full h-8 focus:outline-none focus:ring p-2 focus:border-blue-300">
                    </div>
                    <div class="text-red-600">
                        @error('contactPhone')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Type your message</label>
                        <textarea name="" id="" rows="5"  wire:model.defer="contactComment"
                            class="border shadow outline block w-full focus:outline-none p-2 focus:ring focus:border-blue-300"></textarea>
                    </div>
                    <div class="text-red-600">
                        @error('contactComment')
                            {{ $message }}
                        @enderror
                    </div>
                    @if (session()->has('message'))
                        <div class="text-green-600 text-center pt-2">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="w-full my-3">
                        <button type="submit" class="btn btn-dark w-full" wire:loading.remove wire:target="contactUs" >Submit</button>
                        <div wire:loading wire:target="contactUs"
                            class="btn btn-dark w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="margin: auto; background: #222222; display: block; shape-rendering: auto;"
                                width="40px" height="40px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <circle cx="50" cy="50" fill="none" stroke="#ffff" stroke-width="4" r="27"
                                    stroke-dasharray="127.23450247038662 44.411500823462205">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                                        dur="1s" values="0 50 50;360 50 50" keyTimes="0;1">
                                    </animateTransform>
                                </circle>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
