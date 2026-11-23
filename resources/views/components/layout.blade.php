<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}" />
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('/js/tailwind.js') }}"></script>
    <style type="text/tailwindcss">
    @theme {
        --color-laravel: #ef3b2d;
    }
</style>

     <title>@yield('title', 'LaraGigs | Find Laravel Jobs & Projects')</title>

</head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="{{"/"}}"><img class="w-24" src="{{ asset("images/logo.png")}}" alt="" class="logo"></a>
            <ul class="flex space-x-4 mr-6 text-lg">
                @auth
                <li>
                    <span class="text-black-500"> Welcome {{auth()->user()->name}}
                        </span>

                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>Manage Listings
                        </a
                    >
                </li>
                <li>

                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit"><i class="fa-solid fa-door-closed"></i>Logout
                    </button>

                    </form>
                    </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>


        <main>{{$slot}}</main>

    <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2026, All Rights reserved</p>

            <a
                href="{{"/List/create"}}"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Job</a
            >
        </footer>
        <x-successMessage />

    </body>
</html>
