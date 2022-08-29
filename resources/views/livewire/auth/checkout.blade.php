<div class="root">
    <div class="container-margin w-11/12 mx-auto block mt-10 ">
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body overflow-y-scroll">
                        <form action="" class="w-full  bg-white my-6 block mx-auto">
                            <div class="header-account-setting">
                                <h1 class="lg:text-xl text-lg font-bold mb-2 text-center">Add New Location</h1>
                            </div>
                            <div class="input mx-auto my-1">
                                <label for="" class="block w-11/12 mx-auto">Fullname</label>
                                <input type="text" wire:model.lazy="fullname"
                                    class="border shadow outline block w-11/12 mx-auto h-10 focus:outline-none focus:ring focus:border-blue-200 p-2">
                                @error('fullname')
                                    <div class="error text-red-600 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input mx-auto my-1">
                                <label for="" class="block w-11/12 mx-auto">Country</label>
                                <select type="text" wire:model.lazy="country"
                                    class="border shadow outline block w-11/12 mx-auto h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                                    <option value="">--Select Country--</option>
                                    <option value="Ghana">Ghana</option>
                                </select>
                                @error('country')
                                    <div class="error text-red-600 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input mx-auto my-1">
                                <label for="" class="block w-11/12 mx-auto">Region</label>
                                <select type="text" wire:model.lazy="region"
                                    class="border shadow outline block w-11/12 mx-auto h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                                    <option value="">--Select Region--</option>
                                    @foreach ($getDestinationDetails as $destinationRegion)
                                        <option value="{{ $destinationRegion->region }}">
                                            {{ $destinationRegion->region }}</option>
                                    @endforeach
                                </select>
                                @error('region')
                                    <div class="error text-red-600 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input mx-auto my-1">
                                <label for="" class="block w-11/12 mx-auto">Location</label>
                                <select type="text" wire:model.lazy="location"
                                    class="border shadow outline block w-11/12 mx-auto h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                                    <option value="">-- Select Location --</option>
                                    @foreach ($findDestination as $destination)
                                        <option value="{{ $destination->location }}">{{ $destination->location }}
                                        </option>
                                    @endforeach
                                </select> @error('location')
                                    <div class="error text-red-600 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input mx-auto my-1">
                                <label for="" class="block w-11/12 mx-auto">Phone Number</label>
                                <input type="tel" wire:model.lazy="tel"
                                    class="border shadow outline block w-11/12 mx-auto h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                                @error('tel')
                                    <div class="error text-red-600 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @if (!empty($findPriceDestination))
                                @foreach ($findPriceDestination as $findPriceDestinations)
                                    <h3 class="text-green-800 p-2 text-lg shadow  text-center">Delivery Fee Ghc
                                        {{ $findPriceDestinations->price }}</h3>
                                    <div class="input mx-auto my-1 w-11/12 mx-auto">
                                        <button type="submit"
                                            wire:click.prevent="addInformation({{ $findPriceDestinations->id }})"
                                            class="btn btn-dark py-3 my-5 w-full">Submit</button>
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-account-setting">
            <h1 class="lg:text-2xl font-bold p-2 mb-2 text-center">Billing and Shipping</h1>
        </div>
        @if (!empty($usersInforExist) && $usersInforExist->count() > 0)
            <div class="header-account-setting md:flex md:justify-between md:items-center">
                <div class="text hidden md:block text-sm">
                    <h5 class="text-sm"></h5>
                </div>
                <button class="mt-5 bg-blue-600 text-white py-2 px-1 hidden md:block md:w-1/4" type="button"
                    data-bs-toggle="modal" data-bs-target="#exampleModal"">Add new location</button>
                <button class="      mt-5 bg-blue-600 text-white py-2 px-1 w-11/12 mx-auto block md:hidden"
                    type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Location</button>
            </div>
            @foreach ($usersInforExist as $userInforExist)
                <div class="contains shadow-xl w-full md:mx-3 my-2 mx-auto block relative">
                    <div class="header bg-gray-100 p-2 text-center flex justify-between align-center items-center">
                        <h3 class="text-lg">Your location</h3>
                        <h4 class="md:w-1/2 text-sm hidden md:block">Date Added:
                            {{ \Carbon\Carbon::parse($userInforExist->created_at)->format('d/m/Y') }}</h4>
                        <div class="image edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </div>
                        <div wire:click="deleteLocation({{ $userInforExist->id }})" class="image delete md:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red"
                                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                            </svg>
                        </div>
                    </div>
                    <div class="details p-2 w-full ">
                        <div class="product md:flex md:justify-evenly">
                            <h4 class="md:w-1/2 text-sm">Fullname: {{ $userInforExist->fullname }}</h4>
                            <h4 class="md:w-1/2 text-sm">Tel Number: {{ $userInforExist->phone }}</h4>
                        </div>
                        <div class="product md:flex md:justify-evenly">
                            <h4 class="md:w-1/2 text-sm">Country: {{ $userInforExist->destinations->country }}</h4>
                            <h4 class="md:w-1/2 text-sm">Region: {{ $userInforExist->destinations->region }}</h4>
                        </div>
                        <div class="product md:flex md:justify-evenly">
                            <h4 class="md:w-1/2 text-sm">Loaction: {{ $userInforExist->destinations->location }}</h4>
                            <h4 class="md:w-1/2 text-sm">Delivery Fee: {{ $userInforExist->destinations->price }}</h4>
                        </div>
                        <div class="buutons my-2 md:flex md:justify-between">
                            <div class="button hidden md:block">
                                <button class="btn btn-danger"
                                    wire:click="deleteLocation({{ $userInforExist->id }})">Delete
                                    location</button>
                            </div>
                            <div class="button w-full md:w-60">
                                <button class="btn btn-dark px-4 w-full"
                                    wire:click="confirmLocation({{ $userInforExist->id }})">Continue with
                                    details</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="checkout-form">
                <div class="header-account-setting w-1/2">
                    <h1 class="text-3xl font-bold text-center">Details</h1>
                </div>
                <form action="" class="mx-auto block w-11/12 md:w-1/2">
                    @csrf
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Fullname</label>
                        <input type="text" wire:model.lazy="fullname"
                            class="border shadow outline block w-full h-10 focus:outline-none focus:ring focus:border-blue-200 p-2">
                        @error('fullname')
                            <div class="error text-red-600 ">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Country</label>
                        <select type="text" wire:model.lazy="country"
                            class="border shadow outline block w-full h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                            <option value="">--Select Country--</option>
                            <option value="Ghana">Ghana</option>
                        </select>
                        @error('country')
                            <div class="error text-red-600 ">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Region</label>
                        <select type="text" wire:model.lazy="region"
                            class="border shadow outline block w-full h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                            <option value="">--Select Region--</option>
                            @foreach ($getDestinationDetails as $destinationRegion)
                                <option value="{{ $destinationRegion->region }}">{{ $destinationRegion->region }}
                                </option>
                            @endforeach
                        </select>
                        @error('region')
                            <div class="error text-red-600 ">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Location</label>
                        <select type="text" wire:model.lazy="location"
                            class="border shadow outline block w-full h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                            <option value="">--Select Location--</option>
                            @foreach ($findDestination as $destination)
                                <option value="{{ $destination->location }}">{{ $destination->location }}
                                </option>
                            @endforeach
                        </select>
                        @error('address')
                            <div class="error text-red-600 ">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input mx-auto my-8">
                        <label for="" class="block">Phone Number</label>
                        <input type="tel" wire:model.lazy="tel"
                            class="border shadow outline block w-full h-10 focus:outline-none focus:ring focus:border-blue-300 p-2">
                        @error('tel')
                            <div class="error text-red-600 ">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if (!empty($findPriceDestination))
                        @foreach ($findPriceDestination as $findPriceDestinations)
                            <h3 class="text-green-800 p-2 text-lg shadow  text-center">Delivery Fee Ghc
                                {{ $findPriceDestinations->price }}</h3>
                            <button type="submit"
                                wire:click.prevent="userInformation({{ $findPriceDestinations->id }})"
                                class="btn btn-dark w-full py-2 block mx-auto">Add location</button>
                        @endforeach
                    @endif
                </form>
            </div>
        @endif
    </div>
</div>
