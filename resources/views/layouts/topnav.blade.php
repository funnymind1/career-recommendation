<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-seo :title="isset($title) ? $title . ' | ' . config('app.name') : config('app.name')" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900"
    x-data="{ mobileNav: false, userMenu: false, pageLoaded: false, darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="
        window.addEventListener('load', () => setTimeout(() => pageLoaded = true, 500));
        $watch('darkMode', val => { localStorage.setItem('darkMode', val); document.documentElement.classList.toggle('dark', val); });
        if (darkMode) document.documentElement.classList.add('dark');
    ">

    <!-- Preloader -->
    <div x-show="!pageLoaded" x-transition:leave="transition-opacity duration-500 ease-in-out"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-white/95 backdrop-blur-sm">
        <div class="flex flex-col items-center gap-6">
            <div class="relative flex items-center justify-center w-20 h-20">
                <!-- Outer spinning rings -->
                <div
                    class="absolute inset-0 border-2 border-transparent border-t-brand-500 border-r-brand-500 rounded-full animate-spin">
                </div>
                <div class="absolute inset-2 border-2 border-transparent border-b-brand-300 border-l-brand-300 rounded-full animate-spin"
                    style="animation-direction: reverse; animation-duration: 1.5s;"></div>

                <!-- Center Logo -->
                <div
                    class="relative w-10 h-10 bg-brand-600 rounded-xl flex items-center justify-center shadow-lg shadow-brand-500/30 animate-pulse">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>

            <!-- Text loading -->
            <div class="flex flex-col items-center gap-2">
                <span class="text-sm font-semibold tracking-widest text-gray-800 uppercase">Careerly</span>
                <div class="flex gap-1">
                    <div class="w-1.5 h-1.5 bg-brand-500 rounded-full animate-bounce"></div>
                    <div class="w-1.5 h-1.5 bg-brand-500 rounded-full animate-bounce" style="animation-delay: 0.15s">
                    </div>
                    <div class="w-1.5 h-1.5 bg-brand-500 rounded-full animate-bounce" style="animation-delay: 0.3s">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-brand-600">Careerly</a>

                <!-- Desktop Nav Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('dashboard') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'text-brand-600' : 'text-gray-600 hover:text-gray-900' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('quiz') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('quiz') ? 'text-brand-600 border-b-2 border-brand-600 pb-[18px]' : 'text-gray-600 hover:text-gray-900' }}">
                        Skill Assessment
                    </a>
                    <a href="{{ route('about') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('about') ? 'text-brand-600 border-b-2 border-brand-600 pb-[18px]' : 'text-gray-600 hover:text-gray-900' }}">
                        About
                    </a>
                    <a href="{{ route('internships') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('internships*') ? 'text-brand-600 border-b-2 border-brand-600 pb-[18px]' : 'text-gray-600 hover:text-gray-900' }}">
                        Internships
                    </a>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-3">
                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode"
                        class="relative p-2 text-gray-400 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition"
                        :title="darkMode ? 'Light Mode' : 'Dark Mode'">
                        <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    <!-- Notification Bell -->
                    <button class="relative p-2 text-gray-400 hover:text-gray-600 bg-gray-50 rounded-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- User Avatar / Dropdown -->
                    <div class="relative">
                        <button @click="userMenu = !userMenu"
                            class="focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition rounded-full">
                            @if(Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                    class="w-9 h-9 rounded-full object-cover border-2 border-brand-200 shadow-sm">
                            @else
                                <div
                                    class="w-9 h-9 bg-gradient-to-br from-brand-500 to-brand-700 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </button>
                        <div x-show="userMenu" @click.away="userMenu = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-1 z-50"
                            style="display:none">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Log
                                    Out</button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile Hamburger -->
                    <button @click="mobileNav = !mobileNav" class="md:hidden p-2 text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div x-show="mobileNav" x-transition class="md:hidden bg-white border-t border-gray-100 px-4 pb-4 space-y-1">
            <a href="{{ route('dashboard') }}"
                class="block py-2.5 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-brand-600' : 'text-gray-600' }}">Dashboard</a>
            <a href="{{ route('quiz') }}"
                class="block py-2.5 text-sm font-medium {{ request()->routeIs('quiz') ? 'text-brand-600' : 'text-gray-600' }}">Skill
                Assessment</a>
            <a href="{{ route('about') }}"
                class="block py-2.5 text-sm font-medium {{ request()->routeIs('about') ? 'text-brand-600' : 'text-gray-600' }}">About
                Us</a>
            <a href="{{ route('internships') }}"
                class="block py-2.5 text-sm font-medium {{ request()->routeIs('internships*') ? 'text-brand-600' : 'text-gray-600' }}">Internships</a>
        </div>
    </nav>

    <!-- Toast Notification -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95" class="fixed bottom-6 right-6 z-[200] max-w-sm">
            <div
                class="flex items-start gap-3 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-2xl shadow-gray-900/10 p-4">
                <div
                    class="w-9 h-9 bg-green-50 dark:bg-green-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0 pt-0.5">
                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Success</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">{{ session('success') }}</p>
                </div>
                <button @click="show = false"
                    class="text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 transition flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Progress bar -->
            <div class="mt-1 mx-4 h-0.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                <div class="h-full bg-green-400 rounded-full" style="animation: shrink 5s linear forwards;"></div>
            </div>
        </div>
        <style>
            @keyframes shrink {
                from {
                    width: 100%;
                }

                to {
                    width: 0%;
                }
            }
        </style>
    @endif

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

</body>

</html>