
<section class="relative min-h-[360px] bg-[#123B32] flex flex-col justify-center items-center text-center px-4 py-12 mb-8 overflow-hidden">

    {{-- Decorative background --}}
    <div class="absolute inset-0 opacity-10 pointer-events-none"
        style="background: radial-gradient(circle at center, #E8B45A 0%, transparent 65%);">
    </div>

    <div class="relative z-10 max-w-3xl">

        {{-- Brand name --}}
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-white">
            Kampala <span class="text-[#E8B45A]">Gigs</span>
        </h1>

        {{-- Main message --}}
        <p class="text-xl md:text-2xl text-white font-bold mt-5">
            Find work. Discover opportunities. Hire talent.
        </p>

        {{-- Supporting message --}}
        <p class="text-base md:text-lg text-gray-200 mt-4 leading-relaxed">
            Connecting Ugandan employers with skilled people,
            one opportunity at a time.
        </p>

        {{-- Registration button --}}
        <div class="mt-8">
            @auth
                <a href="/List/create"
                    class="inline-block bg-[#E8B45A] text-[#123B32] font-bold py-3 px-7 rounded-lg hover:bg-white transition duration-300">
                    Post an Opportunity
                </a>
            @else
                <a href="/register"
                    class="inline-block bg-[#E8B45A] text-[#123B32] font-bold py-3 px-7 rounded-lg hover:bg-white transition duration-300">
                    Get Started
                </a>
            @endauth
        </div>

    </div>
</section>
