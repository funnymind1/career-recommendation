@php
    $pageTitle = 'About Us | Careerly';
    $pageDescription = 'Discover our mission to empower students in their career journey through data-driven recommendations and tracking.';
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-seo :title="$pageTitle" :description="$pageDescription" />

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
                    <a href="{{ url('/#features') }}"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">Features</a>
                    <a href="{{ url('/#how-it-works') }}"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">How It Works</a>
                    <a href="{{ url('/#careers') }}"
                        class="text-sm font-medium text-gray-600 hover:text-brand-600 transition">Careers</a>
                    <a href="{{ route('about') }}" class="text-sm font-bold text-brand-600 transition">About</a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02] active:scale-[0.98]">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-brand-600 transition">Login</a>
                        <a href="{{ route('login') }}?tab=register"
                            class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02] active:scale-[0.98]">Get
                            Started</a>
                    @endauth
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
            <a href="{{ url('/#features') }}" class="block py-2 text-sm text-gray-600">Features</a>
            <a href="{{ url('/#how-it-works') }}" class="block py-2 text-sm text-gray-600">How It Works</a>
            <a href="{{ url('/#careers') }}" class="block py-2 text-sm text-gray-600">Careers</a>
            <a href="{{ route('about') }}" class="block py-2 text-sm text-brand-600 font-bold">About Us</a>
            <div class="pt-2 border-t border-gray-100 flex gap-2">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="flex-1 text-center py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-xl">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="flex-1 text-center py-2.5 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl">Login</a>
                    <a href="{{ route('login') }}?tab=register"
                        class="flex-1 text-center py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-xl">Get
                        Started</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <header class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 right-0 w-96 h-96 bg-brand-100/40 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-50 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-700 transform"
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                <span
                    class="px-4 py-1.5 bg-brand-50 border border-brand-100 text-brand-700 text-xs font-bold uppercase tracking-widest rounded-full mb-6 inline-block">Our
                    Story</span>
                <h1 class="text-4xl sm:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                    We bridge the gap between<br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-brand-400">Ambition
                        and Achievement</span>
                </h1>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                    Careerly was built with a single vision: to ensure every final-year student finds the career path
                    that truly resonates with their skills and passion.
                </p>
            </div>
        </div>
    </header>

    {{-- Stats Section --}}
    <section class="py-12 bg-white relative z-10 -mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-8 bg-white rounded-3xl p-10 shadow-xl shadow-brand-500/5 border border-gray-100">
                <div class="text-center" x-data="{ count: 0, target: 15, shown: false }"
                    x-intersect.once="shown = true; let timer = setInterval(() => { if(count < target) count++; else clearInterval(timer) }, 50)">
                    <div class="text-4xl font-black text-brand-600 mb-2" x-text="count + 'k+'">0k+</div>
                    <div class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Students Helped</div>
                </div>
                <div class="text-center" x-data="{ count: 0, target: 120, shown: false }"
                    x-intersect.once="shown = true; let timer = setInterval(() => { if(count < target) count += 4; else clearInterval(timer) }, 30)">
                    <div class="text-4xl font-black text-brand-600 mb-2" x-text="count + '+'">0+</div>
                    <div class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Major Partners</div>
                </div>
                <div class="text-center" x-data="{ count: 0, target: 45, shown: false }"
                    x-intersect.once="shown = true; let timer = setInterval(() => { if(count < target) count++; else clearInterval(timer) }, 40)">
                    <div class="text-4xl font-black text-brand-600 mb-2" x-text="count + '+'">0+</div>
                    <div class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Career Paths</div>
                </div>
                <div class="text-center" x-data="{ count: 0, target: 94, shown: false }"
                    x-intersect.once="shown = true; let timer = setInterval(() => { if(count < target) count++; else clearInterval(timer) }, 30)">
                    <div class="text-4xl font-black text-brand-600 mb-2" x-text="count + '%'">0%</div>
                    <div class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Success Rate</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission/Vision Section --}}
    <section class="py-24 bg-gray-50/50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 underline-brand" data-aos="fade-up">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Our Mission & Vision</h2>
                <div class="w-24 h-1.5 bg-brand-600 mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-500 font-medium">Empowering the next generation through clarity and
                    opportunity.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Mission --}}
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all h-full group">
                    <div class="flex flex-col sm:flex-row gap-8 items-start text-left">
                        <div
                            class="flex-shrink-0 w-16 h-16 bg-brand-50 rounded-2xl shadow-sm border border-brand-100 text-brand-600 flex items-center justify-center group-hover:bg-brand-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-extrabold text-gray-900 mb-4 tracking-tight">The Mission</h2>
                            <p class="text-gray-600 leading-relaxed text-lg font-medium">
                                Our platform combines psychological insights with market data to provide career
                                recommendations that aren't just accurate, but actionable. We aim to bridge the
                                technical gap in modern education.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Vision --}}
                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all h-full group">
                    <div class="flex flex-col sm:flex-row gap-8 items-start text-left">
                        <div
                            class="flex-shrink-0 w-16 h-16 bg-blue-50 rounded-2xl shadow-sm border border-blue-100 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-extrabold text-gray-900 mb-4 tracking-tight">The Vision</h2>
                            <p class="text-gray-600 leading-relaxed text-lg font-medium">
                                Careerly was built with a single vision: to ensure every final-year student finds the
                                career path that truly resonates with their skills and passion, creating a world of
                                personalized professional futures.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline Section (Our Journey) --}}
    <section class="py-24 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Our Journey</h2>
                <div class="w-24 h-1.5 bg-brand-600 mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-500 font-medium">How we evolved from an idea to a leader in student career
                    orientation.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php
                    $journey = [
                        [
                            'year' => '2023',
                            'title' => 'The Vision',
                            'desc' => 'Careerly was founded with the goal of solving the student career crisis.',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        ],
                        [
                            'year' => '2024',
                            'title' => 'Smart Matching',
                            'desc' => 'Released our AI-driven skill assessment quiz that matches interests to jobs.',
                            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                        ],
                        [
                            'year' => '2025',
                            'title' => 'Global Partnerships',
                            'desc' => 'Partnered with 100+ top companies to offer exclusive internships.',
                            'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                        ],
                        [
                            'year' => '2026',
                            'title' => 'Expansion',
                            'desc' => 'Broadening our impact to help every final year student find their path.',
                            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        ],
                    ];
                @endphp

                @foreach ($journey as $index => $item)
                    <div data-aos="fade-up" data-aos-delay="{{ 100 + $index * 100 }}"
                        class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all group h-full">
                        <div class="flex gap-6 items-start">
                            <div
                                class="flex-shrink-0 w-14 h-14 bg-brand-50 rounded-2xl flex items-center justify-center text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-all duration-500">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $item['icon'] }}" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-brand-600 font-black text-xl mb-1 block">{{ $item['year'] }}</span>
                                <h3
                                    class="text-2xl font-bold text-gray-900 mb-2 tracking-tight group-hover:text-brand-600 transition-colors">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-gray-500 leading-relaxed text-base font-medium">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">The Core Team</h2>
                <p class="text-lg text-gray-500 font-medium">Meet the experts building the future of career guidance.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @php
                    $team = [
                        ['name' => 'Sarah Johnson', 'role' => 'Founder & CEO', 'bio' => 'Passionate about education and mentoring students.'],
                        ['name' => 'Michael Chen', 'role' => 'Head of AI', 'bio' => 'Expert in data science and recommendation algorithms.'],
                        ['name' => 'Elena Rodriguez', 'role' => 'Partnerships', 'bio' => 'Connecting students with industry-leading companies.'],
                    ];
                @endphp
                @foreach ($team as $index => $member)
                    <div class="text-center group" data-aos="fade-up"
                        data-aos-delay="{{ 100 + $index * 100 }}">
                        <div
                            class="w-48 h-48 bg-brand-50 rounded-[2.5rem] mx-auto mb-6 flex items-center justify-center text-6xl group-hover:rotate-6 group-hover:scale-105 transition-all duration-500 overflow-hidden relative border-2 border-brand-100/50">
                            <div class="absolute inset-0 bg-gradient-to-tr from-brand-600/10 to-transparent"></div>
                            👤
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1 tracking-tight">{{ $member['name'] }}</h3>
                        <p class="text-brand-600 font-black text-sm uppercase tracking-widest mb-4">{{ $member['role'] }}
                        </p>
                        <p class="text-gray-500 font-medium leading-relaxed">{{ $member['bio'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-24 bg-gray-50/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-500 font-medium">Quick answers to common questions about our platform.</p>
            </div>

            <div class="space-y-4" x-data="{ active: null }">
                @php
                    $faqs = [
                        ['q' => 'How does the career quiz work?', 'a' => 'Our quiz uses advanced algorithms to map your skills, interests, and personality traits to thousands of real-world career paths.'],
                        ['q' => 'Is Careerly free for students?', 'a' => 'Yes! Our core mission is to help students, so the basic assessment and internship tracker are completely free.'],
                        ['q' => 'How are the internship listings verified?', 'a' => 'Our partnerships team personally verifies every company and role to ensure they provide a legitimate learning experience.'],
                        ['q' => 'What if I am not sure about my skills?', 'a' => 'Our quiz is designed to help you discover them. We ask questions that reveal latent abilities you might not even realize you have.'],
                        ['q' => 'Can I retake the career quiz?', 'a' => 'Absolutely. You can retake the quiz at any time as you gain new skills or interests to see how your career matches evolve.'],
                        ['q' => 'Do you offer guidance for graduate school?', 'a' => 'Our primary focus is on career paths and internships, but we provide resources for higher education if it is a prerequisite for your chosen path.'],
                        ['q' => 'How accurate are the salary projections?', 'a' => 'We use real-time market data from global sources, though projections are estimates based on current industry averages.'],
                        ['q' => 'Can I track my internship applications?', 'a' => 'Yes, our platform includes a built-in internship tracker to help you manage your application status and deadlines.'],
                        ['q' => 'Are there resources for building a resume?', 'a' => 'Yes, once you find your career path, we provide tailored advice and templates for creating a stand-out resume.'],
                        ['q' => 'How can I contact support?', 'a' => 'You can reach out via the support desk in your student dashboard or email us directly at support@careerly.com.']
                    ];
                @endphp
                @foreach ($faqs as $index => $faq)
                    <div
                        class="bg-white border border-gray-100 rounded-3xl overflow-hidden transition-all duration-300 {{ $index === 0 ? 'shadow-lg shadow-brand-500/5' : '' }}">
                        <button @click="active = (active === {{ $index }} ? null : {{ $index }})"
                            class="w-full text-left px-8 py-6 flex items-center justify-between hover:bg-gray-50 transition">
                            <span class="text-lg font-bold text-gray-900 tracking-tight">{{ $faq['q'] }}</span>
                            <svg class="w-6 h-6 text-brand-600 transition-transform duration-300"
                                :class="active === {{ $index }} ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="active === {{ $index }}" x-collapse x-cloak>
                            <div class="px-8 pb-8 text-gray-500 font-medium leading-relaxed text-lg">
                                {{ $faq['a'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-6 tracking-tight">Our Core Values</h2>
                <p class="text-lg text-gray-500 font-medium">The principles that guide every decision we make and every
                    feature we build.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $values = [
                        ['title' => 'Empowerment', 'desc' => 'We give students the tools and confidence to own their professional narrative.', 'icon' => '⚡'],
                        ['title' => 'Clarity', 'desc' => 'We cut through the noise of the job market to show you the paths that truly fit.', 'icon' => '🔍'],
                        ['title' => 'Impact', 'desc' => 'We measure our success by the growth and success of the students we serve.', 'icon' => '🎯']
                    ];
                @endphp
                @foreach ($values as $index => $value)
                    <div data-aos="fade-up" data-aos-delay="{{ 100 + $index * 100 }}"
                        class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-500 hover:-translate-y-2 group">
                        <div
                            class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-3xl mb-8 group-hover:scale-110 transition-transform duration-500">
                            {{ $value['icon'] }}
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">{{ $value['title'] }}</h3>
                        <p class="text-gray-500 leading-relaxed text-lg font-medium">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
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