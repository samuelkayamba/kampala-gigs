
@props(['file'])

<x-card>
    <div class="flex flex-col md:flex-row gap-5">

        {{-- Company logo --}}
        <div class="flex-shrink-0">
            <img
                class="w-full h-40 md:w-40 md:h-40 object-contain rounded-lg bg-gray-50 p-2"
                src="{{ $file->logo ? asset('storage/'.$file->logo) : asset('/images/no-image.png') }}"
                alt="{{ $file->company }} logo"
            />
        </div>

        {{-- Listing information --}}
        <div class="flex-1 text-center flex flex-col items-center">

            {{-- Job title --}}
            <h3 class="text-xl md:text-2xl font-bold text-[#123B32] hover:text-[#E8B45A]">
                <a href="/List/{{ $file->id }}">
                    {{ $file->title }}
                </a>
            </h3>

            {{-- Company --}}
            <div class="text-lg font-semibold text-gray-700 mt-1 mb-3">
                {{ $file->company }}
            </div>

            {{-- Job category tags --}}
            <x-listing-cards :tagsCsv="$file->tags"/>

            {{-- Job details --}}
            <div class="mt-4 flex flex-wrap justify-center gap-2">

                @if($file->job_type)
                    <span class="bg-[#E8B45A] text-[#123B32] px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $file->job_type }}
                    </span>
                @endif

                @if($file->district)
                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                        {{ $file->district }}
                    </span>
                @endif

                @if(!is_null($file->salary_ugx))
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                        UGX {{ number_format($file->salary_ugx) }}
                    </span>
                @endif

            </div>

            {{-- Location --}}
            <div class="text-gray-600 mt-4 text-center">
                <i class="fa-solid fa-location-dot text-[#123B32]"></i>
                {{ $file->location }}
            </div>

            {{-- View listing --}}
            <div class="mt-5">
                <a href="/List/{{ $file->id }}"
                    class="inline-block bg-[#123B32] text-white px-5 py-2 rounded-lg font-semibold hover:bg-[#1D594B] transition">
                    View Opportunity
                    <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>
    </div>
</x-card>
