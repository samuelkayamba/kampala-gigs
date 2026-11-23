@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col sm:flex-row items-center justify-between gap-4 my-6">

        {{-- Left Side: "Showing page 2 of 20" --}}
        <div class="text-sm text-gray-700">
            Showing page <span class="font-bold text-black">{{ $paginator->currentPage() }}</span>
            of <span class="font-bold text-black">{{ $paginator->lastPage() }}</span>
            <span class="text-gray-500">({{ $paginator->total() }} total gigs)</span>
        </div>

        {{-- Right Side: Previous + Numbered Links + Next --}}
        <div class="inline-flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 border border-gray-200 rounded cursor-not-allowed">
                    &laquo; Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100">
                    &laquo; Prev
                </a>
            @endif

            {{-- Numbered Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 py-1.5 text-sm text-gray-500">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="px-3.5 py-1.5 text-sm font-bold text-white bg-laravel border border-laravel rounded">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-3.5 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100 hover:text-laravel">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100">
                    Next &raquo;
                </a>
            @else
                <span class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 border border-gray-200 rounded cursor-not-allowed">
                    Next &raquo;
                </span>
            @endif
        </div>
    </nav>
@endif
