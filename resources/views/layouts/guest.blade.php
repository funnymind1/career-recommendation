<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Careerly') }}</title>

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

<body class="font-sans antialiased bg-gray-100 min-h-screen flex items-center justify-center p-4"
    x-data="{ pageLoaded: false }"
    x-init="window.addEventListener('load', () => setTimeout(() => pageLoaded = true, 500))">

    <!-- Preloader -->
    <div x-show="!pageLoaded" x-transition:leave="transition-opacity duration-500 ease-in-out"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-gray-50/95 backdrop-blur-sm">
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

    <div class="w-full max-w-md" data-aos="fade-up">
        {{ $slot }}
    </div>

</body>

</html>