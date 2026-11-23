
@section('title', 'LaraGigs | Latest Listings')
<x-layout>
@include('partials._hero')
@include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4" >
        @forelse ($files as $file)
             <x-listing-card :file="$file"/>

        @empty
            <p class="text-center col-span-2 text-gray-500 text-lg py-10">No listings found.</p>
        @endforelse
    </div>
    <div class="mt-6 p-4">
    {{ $files->links()}}
    </div>
</x-layout>
