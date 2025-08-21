<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Products' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100">
    <nav class="bg-white/80 backdrop-blur border-b sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex h-14 items-center justify-between">
                <a href="{{ route('products.index') }}" class="text-lg md:text-xl font-semibold tracking-tight">Product CRUD</a>

                <div class="hidden md:flex items-center gap-2">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="btn-animate px-3 py-1.5 rounded-md text-sm font-medium text-white bg-black hover:bg-gray-800 transition">Logout</button>
                        </form>
                    @else
                        <a class="px-3 py-1.5 rounded-md text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-100 transition" href="{{ route('login') }}">Login</a>
                        <a class="px-3 py-1.5 rounded-md text-sm font-medium text-white bg-black hover:bg-gray-800 transition" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>

                <button id="mobile-menu-button" aria-expanded="false" aria-controls="mobile-menu"
                    class="btn-animate md:hidden inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:text-black hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition">
                    <svg id="icon-menu" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                    <svg id="icon-close" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>

            <div id="mobile-menu" class="md:hidden hidden pb-3">
                <div class="flex flex-col gap-2 pt-2">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="btn-animate w-full text-left px-3 py-2 rounded-md text-sm font-medium text-white bg-black hover:bg-gray-800 transition">Logout</button>
                        </form>
                    @else
                        <a class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-100 transition" href="{{ route('login') }}">Login</a>
                        <a class="px-3 py-2 rounded-md text-sm font-medium text-white bg-black hover:bg-gray-800 transition" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <main class="@yield('main_class', 'max-w-5xl mx-auto p-4')">
        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-3">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>


