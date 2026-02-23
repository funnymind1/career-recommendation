<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-seo :title="'Careerly — Your Career Starts Here'" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-white text-gray-900" x-data="{ mobileMenu: false, pageLoaded: false }"
    x-init="window.addEventListener('load', () => setTimeout(() => pageLoaded = true, 500))">

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

    <!-- Navbar -->
    <nav class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-xl border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-brand-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-brand-600">Careerly</span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">Features</a>
                    <a href="#how-it-works"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">How It Works</a>
                    <a href="#careers"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">Careers</a>
                    <a href="{{ route('about') }}"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">About</a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-brand-600 transition">Login</a>
                    <a href="{{ route('login') }}?tab=register"
                        class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02] active:scale-[0.98]">Get
                        Started</a>
                </div>

                <!-- Mobile Hamburger -->
                <button @click="mobileMenu = !mobileMenu" class="md:hidden text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" x-transition class="md:hidden bg-white border-t border-gray-100 px-4 pb-4 space-y-2">
            <a href="#features" class="block py-2 text-sm text-gray-600">Features</a>
            <a href="#how-it-works" class="block py-2 text-sm text-gray-600">How It Works</a>
            <a href="#careers" class="block py-2 text-sm text-gray-600">Careers</a>
            <a href="{{ route('about') }}" class="block py-2 text-sm text-gray-600 font-medium text-brand-600">About
                Us</a>
            <div class="pt-2 border-t border-gray-100 flex gap-2">
                <a href="{{ route('login') }}"
                    class="flex-1 text-center py-2.5 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl">Login</a>
                <a href="{{ route('login') }}?tab=register"
                    class="flex-1 text-center py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-xl">Get
                    Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-20 right-0 w-96 h-96 bg-brand-100/40 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-50 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-brand-50 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 bg-brand-50 border border-brand-100 rounded-full mb-6">
                    <span class="w-2 h-2 bg-brand-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-medium text-brand-700">For Final-Year Students</span>
                </div>

                <h1
                    class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight tracking-tight mb-6">
                    Discover Your
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-brand-800">Perfect
                        Career</span>
                    Path
                </h1>

                <p class="text-lg sm:text-xl text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">
                    Take a skill assessment quiz, get matched to your ideal career, and track internship opportunities —
                    all in one place.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('login') }}?tab=register"
                        class="w-full sm:w-auto px-8 py-4 bg-brand-600 hover:bg-brand-700 text-white text-base font-semibold rounded-2xl shadow-xl shadow-brand-600/25 transition-all transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2">
                        Start Free Assessment
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="#how-it-works"
                        class="w-full sm:w-auto px-8 py-4 bg-white border border-gray-200 text-gray-700 text-base font-semibold rounded-2xl hover:border-brand-200 hover:text-brand-600 transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        See How It Works
                    </a>
                </div>

                <!-- Social Proof -->
                <div class="mt-12 flex items-center justify-center gap-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex -space-x-2">
                        @for ($i = 0; $i < 4; $i++)
                            <div
                                class="w-8 h-8 rounded-full border-2 border-white bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-white text-xs font-bold">
                                {{ ['A', 'B', 'S', 'J'][$i] }}
                            </div>
                        @endfor
                    </div>
                    <p class="text-sm text-gray-500"><span class="font-semibold text-gray-700">500+</span> students
                        matched to careers</p>
                </div>
            </div>

            <!-- Dashboard Preview -->
            <div class="mt-16 relative max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <div
                    class="bg-white rounded-2xl border border-gray-200 shadow-2xl shadow-gray-200/50 overflow-hidden p-4 sm:p-6 hover:shadow-3xl transition-shadow duration-500">
                    <!-- Mock Dashboard -->
                    <div class="bg-gray-50 rounded-xl p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="font-bold text-brand-600 text-sm">Careerly</span>
                            <div class="ml-auto flex gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-300"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-300"></div>
                                <div class="w-3 h-3 rounded-full bg-green-300"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div class="bg-gradient-to-br from-brand-600 to-brand-700 rounded-xl p-3 text-white">
                                <p class="text-white/70 text-xs">Quiz Score</p>
                                <p class="text-xl font-bold">85%</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 border border-gray-100">
                                <p class="text-gray-400 text-xs">Top Match</p>
                                <p class="text-sm font-bold text-gray-900 truncate">Product Designer</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 border border-gray-100">
                                <p class="text-gray-400 text-xs">Internships</p>
                                <p class="text-sm font-bold text-gray-900">3 tracked</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 border border-gray-100">
                                <p class="text-gray-400 text-xs">Profile</p>
                                <p class="text-sm font-bold text-gray-900">Complete</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Glow effect -->
                <div
                    class="absolute -inset-4 bg-gradient-to-r from-brand-200/20 via-transparent to-brand-200/20 rounded-3xl blur-2xl -z-10">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 sm:py-28 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <p class="text-sm font-semibold text-brand-600 uppercase tracking-wider mb-2">Features</p>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Everything you need to launch your career
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-14 h-14 bg-brand-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-100 transition">
                        <svg class="w-7 h-7 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Skill Assessment Quiz</h3>
                    <p class="text-gray-500 leading-relaxed">Answer 10 carefully designed questions to uncover your
                        hidden strengths and unlock personalized career recommendations.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-amber-100 transition">
                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Career Path Matching</h3>
                    <p class="text-gray-500 leading-relaxed">Get matched to career paths like Product Designer, Data
                        Scientist, or Software Engineer based on your unique skills and interests.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-100 transition">
                        <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Internship Tracker</h3>
                    <p class="text-gray-500 leading-relaxed">Browse live internships from top companies, apply directly,
                        and track your application status from Applied to Offer Received.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-10">Trusted by students from top universities</h3>
            <div class="flex flex-wrap justify-center items-center gap-8 sm:gap-16">
                <!-- Replace the src attributes with your own logo paths -->
                <img src="images/ozoro 1.webp" alt="University 1"
                    class="h-20 sm:h-24 w-auto object-contain hover:scale-105 transition-transform duration-300">
                <img src="images/lagos.jpeg" alt="University 2"
                    class="h-20 sm:h-24 w-auto object-contain hover:scale-105 transition-transform duration-300">
                <img src="images/edo.png" alt="University 3"
                    class="h-20 sm:h-24 w-auto object-contain hover:scale-105 transition-transform duration-300">
                <img src="images/delsu.webp" alt="University 4"
                    class="h-20 sm:h-24 w-auto object-contain hover:scale-105 transition-transform duration-300">
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-20 sm:py-32 relative bg-white overflow-hidden">

        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-brand-50/50 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-1/4 w-72 h-72 bg-blue-50/50 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <span
                    class="inline-flex items-center gap-2 px-4 py-1.5 bg-brand-50 border border-brand-100 rounded-full text-sm font-semibold text-brand-700 uppercase tracking-wider mb-6">Process</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-gray-900 tracking-tight">Your journey to success
                </h2>
                <p class="mt-4 text-lg text-gray-500">A clear, step-by-step path designed exclusively for final-year
                    students ready to transition into the professional world.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Connecting Line (Desktop) -->
                <div
                    class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-gray-200 to-transparent -translate-y-1/2 -z-10">
                </div>

                @php
                    $steps = [
                        [
                            'num' => '01',
                            'title' => 'Take the Assessment',
                            'desc' => 'Complete our comprehensive skills and interests quiz to uncover your strengths.',
                            'color' => 'brand',
                            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'
                        ],
                        [
                            'num' => '02',
                            'title' => 'Discover Matches',
                            'desc' => 'Get personalized career path recommendations based on your unique profile.',
                            'color' => 'blue',
                            'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                        ],
                        [
                            'num' => '03',
                            'title' => 'Land Internships',
                            'desc' => 'Apply directly to curated internship opportunities aligned with your goals.',
                            'color' => 'emerald',
                            'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'
                        ],
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="relative group h-full" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">

                        <!-- Step Card -->
                        <div
                            class="bg-white rounded-3xl p-8 border border-gray-100 shadow-xl shadow-gray-200/40 h-full transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-{{ $step['color'] }}-100 relative z-10 overflow-hidden flex flex-col">
                            <!-- Background Number -->
                            <div
                                class="absolute -right-6 -bottom-8 text-9xl font-black text-{{ $step['color'] }}-50 opacity-50 select-none group-hover:scale-110 transition-transform duration-500 ease-out">
                                {{ $step['num'] }}
                            </div>

                            <!-- Icon -->
                            <div
                                class="relative w-16 h-16 bg-{{ $step['color'] }}-50 rounded-2xl flex items-center justify-center mb-8 border border-{{ $step['color'] }}-100 group-hover:bg-{{ $step['color'] }}-100 transition-colors duration-300">
                                <svg class="w-8 h-8 text-{{ $step['color'] }}-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $step['icon'] }}" />
                                </svg>
                                <!-- Step Number Badge -->
                                <div
                                    class="absolute -top-3 -right-3 w-8 h-8 bg-gray-900 border-4 border-white rounded-full flex items-center justify-center text-xs font-bold text-white shadow-sm">
                                    {{ $step['num'] }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="relative flex-1 flex flex-col">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 group-hover:text-{{ $step['color'] }}-700 transition-colors">
                                    {{ $step['title'] }}
                                </h3>
                                <p class="text-gray-500 leading-relaxed text-sm">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 text-center" data-aos="fade-up">
                <a href="{{ route('login') }}?tab=register"
                    class="inline-flex items-center gap-2 font-semibold text-brand-600 hover:text-brand-700 transition group">
                    Start your journey now
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Career Paths Preview -->
    <section id="careers" class="py-20 sm:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <p class="text-sm font-semibold text-brand-600 uppercase tracking-wider mb-2">Career Paths</p>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Explore career possibilities</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $careers = [
                        ['title' => 'Product Designer', 'tags' => ['UI/UX', 'Strategy', 'Research'], 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                        ['title' => 'Data Scientist', 'tags' => ['Analytics', 'ML', 'Python'], 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                        ['title' => 'Software Engineer', 'tags' => ['Development', 'Engineering', 'Systems'], 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                        ['title' => 'Financial Analyst', 'tags' => ['Finance', 'Analysis', 'Strategy'], 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['title' => 'Digital Marketer', 'tags' => ['Marketing', 'Content', 'SEO'], 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z'],
                        ['title' => 'Cybersecurity Analyst', 'tags' => ['Security', 'Networking', 'Risk'], 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ];
                @endphp

                @foreach ($careers as $index => $career)
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group"
                        data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        <div
                            class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-brand-100 transition">
                            <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $career['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $career['title'] }}</h3>
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @foreach ($career['tags'] as $tag)
                                <span
                                    class="px-2.5 py-0.5 bg-gray-100 text-gray-600 text-xs rounded-full font-medium">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <p class="text-sm text-brand-600 font-medium group-hover:text-brand-700 transition">Explore path →
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 sm:py-28 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div
                class="relative bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 rounded-3xl p-10 sm:p-16 text-center overflow-hidden">
                <!-- Decorative -->
                <div class="absolute inset-0 pointer-events-none">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-white/5 rounded-full blur-2xl"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Ready to discover your career path?
                    </h2>
                    <p class="text-brand-200 text-lg max-w-xl mx-auto mb-8">Join hundreds of students who have already
                        found their ideal career match through Careerly.</p>
                    <a href="{{ route('login') }}?tab=register"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white text-brand-700 text-base font-bold rounded-2xl shadow-xl hover:shadow-2xl transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                        Get Started Free
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-10 border-t border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-brand-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="font-bold text-brand-600">Careerly</span>
                </div>
                <p class="text-sm text-gray-400">© {{ date('Y') }} Careerly. Built for final-year students.</p>
            </div>
        </div>
    </footer>

</body>

</html>