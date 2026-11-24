
<x-layout>
    @include('partials._search')

    <div class="max-w-5xl mx-auto px-4 py-6">

        {{-- Back button --}}
        <a href="/"
            class="inline-block text-[#123B32] font-semibold mb-6 hover:text-[#E8B45A]">
            <i class="fa-solid fa-arrow-left"></i>
            Back to opportunities
        </a>

        <x-card>

            {{-- Company logo --}}
            <div class="flex flex-col items-center text-center">

                <img
                    class="w-32 h-32 object-contain rounded-lg bg-gray-50 p-2 mb-5"
                    src="{{ $Listing->logo ? asset('storage/'.$Listing->logo) : asset('/images/no-image.png') }}"
                    alt="{{ $Listing->company }} logo"
                />

                {{-- Title and company --}}
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#123B32] mb-2">
                    {{ $Listing->title }}
                </h1>

                <p class="text-xl font-semibold text-gray-700 mb-5">
                    {{ $Listing->company }}
                </p>

                {{-- Opportunity details --}}
                <div class="flex flex-wrap justify-center gap-2 mb-5">

                    @if($Listing->job_type)
                        <span class="bg-[#E8B45A] text-[#123B32] px-4 py-2 rounded-full text-sm font-bold">
                            {{ $Listing->job_type }}
                        </span>
                    @endif

                    @if($Listing->district)
                        <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm">
                            {{ $Listing->district }}
                        </span>
                    @endif

                    @if(!is_null($Listing->salary_ugx))
                        <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-bold">
                            UGX {{ number_format($Listing->salary_ugx) }}
                        </span>
                    @endif

                </div>

                {{-- Location --}}
                <p class="text-gray-600 mb-5">
                    <i class="fa-solid fa-location-dot text-[#123B32]"></i>
                    {{ $Listing->location }}
                </p>

                {{-- Tags --}}
                <div class="mb-8">
                    <x-listing-cards :tagsCsv="$Listing->tags"/>
                </div>

            </div>

            <hr class="my-6">

            {{-- Description --}}
            <div class="text-left">

                <h2 class="text-2xl font-bold text-[#123B32] mb-4">
                    Opportunity Description
                </h2>

                <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                    {{ $Listing->description }}
                </div>

            </div>

            <hr class="my-6">

            {{-- Employer contact --}}
            <div class="text-center">

                <h2 class="text-2xl font-bold text-[#123B32] mb-5">
                    Interested in this opportunity?
                </h2>

                @if($Listing->email)
                    <a
                        href="mailto:{{ $Listing->email }}"
                        class="block bg-[#123B32] text-white font-semibold mt-4 py-3 rounded-lg hover:opacity-90 transition"
                    >
                        <i class="fa-solid fa-envelope"></i>
                        Contact Employer via Email
                    </a>
                @endif

                @if($Listing->whatsapp_number)

                    @php
                        $whatsapp = preg_replace('/\D+/', '', $Listing->whatsapp_number);

                        if (substr($whatsapp, 0, 1) === '0') {
                            $whatsapp = '256' . substr($whatsapp, 1);
                        }
                    @endphp

                    <a
                        href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Hello, I am interested in the ' . $Listing->title . ' opportunity.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="block bg-green-600 text-white font-semibold mt-4 py-3 rounded-lg hover:bg-green-700 transition"
                    >
                        <i class="fa-brands fa-whatsapp"></i>
                        Apply via WhatsApp
                    </a>

                @endif

                @if($Listing->website)
                    <a
                        href="{{ $Listing->website }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="block bg-gray-800 text-white font-semibold mt-4 py-3 rounded-lg hover:bg-black transition"
                    >
                        <i class="fa-solid fa-globe"></i>
                        Visit Employer Website
                    </a>
                @endif

            </div>

        </x-card>

    </div>
</x-layout>
