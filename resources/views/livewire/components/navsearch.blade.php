<div class="root">
    <div class="div relative">
        <form action="{{ route('product.search', $searches) }}">
            <input wire:model="searches"
                class="form-control py-2 px-2"
                type="text" placeholder="Search Valovov" aria-label="Search">
        </form>
        <span class="absolute right-2 top-2 flex items-center">
            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        @if (Str::length($searches) > 1)
            @if ($results->count() > 0)
                <div class="dropdown absolute bg-white shadow-xl w-11/12 p-1 left-3 z-50">
                    @foreach ($results as $result)
                        <a href="{{ route('product.search', $result->name) }}">
                            <ul class="hover:bg-white">
                                <li class="p-2 border-b ">{{ $result->name }}</li>
                            </ul>
                        </a>
                    @endforeach
                </div>
                
            @elseif ($results->count() > 3)
                <div class="dropdown absolute w-11/12 overflow-hidden overflow-y-scroll p-1 h-60 left-3 z-50">
                    @foreach ($results as $result)
                        <a href="{{ route('product.search', $result->name) }}">
                            <ul class="hover:bg-white">
                                <li class="p-2 border-b ">{{ $result->name }}</li>
                            </ul>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="dropdown absolute bg-white shadow-xl w-11/12 p-1 left-3 z-50">
                    <ul>
                        <li><a href="#">No results found</a></li>
                    </ul>
                </div>
            @endif
        @endif
    </div>
</div>
