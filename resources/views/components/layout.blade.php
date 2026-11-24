
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="{{ asset('images/kampala-gigs-favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}" />
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('/js/tailwind.js') }}"></script>
    <title>@yield('title', 'Kampala Gigs | Find Work & Opportunities')</title>
</head>

<body class="min-h-screen flex flex-col bg-[#F5F5F0] text-gray-800">

    {{-- Navigation --}}
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-wrap justify-between items-center gap-4">

            {{-- Brand --}}
            <a href="/" class="flex items-center gap-2">
                <img
                    class="w-12 h-12 object-contain"
                    src="{{ asset('images/kampala-gigs-logo.png') }}"
                    alt="Kampala Gigs logo"
                />

                <span class="text-xl md:text-2xl font-extrabold text-[#123B32]">
                    Kampala <span class="text-[#E8B45A]">Gigs</span>
                </span>
            </a>

            {{-- Navigation links --}}
            <ul class="flex flex-wrap items-center gap-4 text-sm md:text-base font-medium">

                @auth
                    <li class="text-gray-600">
                        Welcome, {{ auth()->user()->name }}
                    </li>

                    <li>
                        <a href="/listings/manage"
                            class="text-[#123B32] hover:text-[#E8B45A]">
                            <i class="fa-solid fa-gear"></i>
                            Manage Listings
                        </a>
                    </li>

                    <li>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="text-[#123B32] hover:text-red-600">
                                <i class="fa-solid fa-door-closed"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register"
                            class="text-[#123B32] hover:text-[#E8B45A]">
                            <i class="fa-solid fa-user-plus"></i>
                            Register
                        </a>
                    </li>

                    <li>
                        <a href="/login"
                            class="text-[#123B32] hover:text-[#E8B45A]">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>

    {{-- Main content --}}
    <main class="flex-grow w-full">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-[#123B32] text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-sm text-gray-200 text-center">
                Copyright &copy; {{ date('Y') }} Kampala Gigs.
                All Rights Reserved.
            </p>

            @auth
                <a href="/List/create"
                    class="bg-[#E8B45A] text-[#123B32] font-bold py-2 px-5 rounded-lg hover:bg-white transition">
                    <i class="fa-solid fa-plus"></i>
                    Post an Opportunity
                </a>
            @else
                <a href="/register"
                    class="bg-[#E8B45A] text-[#123B32] font-bold py-2 px-5 rounded-lg hover:bg-white transition">
                    Get Started
                </a>
            @endauth

        </div>
    </footer>

    <x-successMessage />

</body>
</html>
