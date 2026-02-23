<x-topnav-layout>
    <div class="max-w-5xl mx-auto py-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
        x-show="show" x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm font-medium text-gray-500" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="hover:text-brand-600 transition">Dashboard</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('quiz.results') }}"
                            class="hover:text-brand-600 transition ml-1 md:ml-2">Career Matches</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1 md:ml-2 text-gray-900 font-bold truncate">{{ $careerPath->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Header Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-8">
                        <div>
                            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-3">
                                {{ $careerPath->title }}
                            </h1>
                            <div class="flex flex-wrap gap-2">
                                @if($careerPath->tags)
                                    @foreach($careerPath->tags as $tag)
                                        <span
                                            class="px-3 py-1 bg-brand-50 dark:bg-brand-900/30 text-brand-700 dark:text-brand-300 rounded-full text-xs font-bold uppercase tracking-wider">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if($userMatchPercent !== null)
                            <div
                                class="flex-shrink-0 flex items-center gap-4 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-2xl border border-gray-100 dark:border-gray-700">
                                <div class="relative w-16 h-16">
                                    <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                                        <path class="fill-none stroke-gray-200 dark:stroke-gray-700" stroke-width="3"
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <path class="fill-none stroke-brand-500" stroke-width="3" stroke-linecap="round"
                                            stroke-dasharray="{{ $userMatchPercent }}, 100"
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span
                                            class="text-sm font-black text-brand-600 dark:text-brand-400">{{ $userMatchPercent }}%</span>
                                    </div>
                                </div>
                                <div class="text-sm">
                                    <p class="text-gray-500 dark:text-gray-400 font-medium">Your Match</p>
                                    <p class="text-gray-900 dark:text-white font-bold whitespace-nowrap">
                                        {{ $userMatchPercent >= 75 ? 'Strong Fit' : ($userMatchPercent >= 50 ? 'Good Fit' : 'Potential Fit') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="prose prose-brand dark:prose-invert max-w-none">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Description</h2>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">{{ $careerPath->description }}
                        </p>

                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Why choose this path?</h2>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 list-none p-0">
                            <li
                                class="flex items-center gap-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-100 dark:border-gray-700 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                High market demand
                            </li>
                            <li
                                class="flex items-center gap-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-100 dark:border-gray-700 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Competitive salaries
                            </li>
                            <li
                                class="flex items-center gap-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-100 dark:border-gray-700 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Career growth potential
                            </li>
                            <li
                                class="flex items-center gap-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-100 dark:border-gray-700 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Opportunity for innovation
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Related Internships -->
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Related Internships</h2>
                        <a href="{{ route('internships') }}"
                            class="text-sm font-bold text-brand-600 hover:text-brand-700 transition">View All</a>
                    </div>
                    @if($relatedInternships->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($relatedInternships as $internship)
                                <a href="{{ route('internships') }}"
                                    class="group block bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-brand-300 dark:hover:border-brand-500 shadow-sm transition-all hover:shadow-md">
                                    <div class="flex justify-between items-start mb-4">
                                        <div
                                            class="w-10 h-10 bg-brand-50 dark:bg-brand-900/30 rounded-xl flex items-center justify-center">
                                            <svg class="w-5 h-5 text-brand-600 dark:text-brand-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="px-2 py-1 bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-[10px] font-black uppercase tracking-widest rounded-lg">Apply
                                            Now</span>
                                    </div>
                                    <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-brand-600 transition">
                                        {{ $internship->role }}
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 mb-4">{{ $internship->company }}</p>
                                    <div class="flex items-center gap-3 text-xs text-gray-400">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $internship->location }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div
                            class="bg-gray-50 dark:bg-gray-900/30 p-10 rounded-3xl text-center border border-dashed border-gray-200 dark:border-gray-700">
                            <p class="text-gray-500 dark:text-gray-400">No specific internships found for this path yet.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="space-y-6">
                <!-- Matches Info -->
                <div class="bg-brand-600 rounded-3xl p-6 text-white overflow-hidden relative">
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-white/10 rounded-full"></div>
                    <h3 class="text-lg font-bold mb-4 relative z-10">Match Keywords</h3>
                    <div class="flex flex-wrap gap-2 relative z-10">
                        @if($careerPath->match_keywords)
                            @foreach($careerPath->match_keywords as $keyword)
                                <span class="px-3 py-1 bg-white/20 rounded-lg text-sm font-medium">{{ $keyword }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Guidance Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Learning Path</h3>
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 rounded-lg flex items-center justify-center font-bold text-sm">
                                1</div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 dark:text-white">Learn Fundamentals</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Focus on the core concepts and
                                    basic skills required for this role.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 rounded-lg flex items-center justify-center font-bold text-sm">
                                2</div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 dark:text-white">Build Projects</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Apply your knowledge by
                                    building a portfolio of relevant work.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 rounded-lg flex items-center justify-center font-bold text-sm">
                                3</div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 dark:text-white">Apply for Internships</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Gain real-world experience
                                    through hands-on roles.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="p-1 rounded-3xl bg-gradient-to-br from-brand-500 to-brand-700">
                    <div class="bg-white dark:bg-gray-800 rounded-[22px] p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Want a custom plan?</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Take our career quiz again to refine
                            your matches.</p>
                        <a href="{{ route('quiz') }}"
                            class="block w-full py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl transition shadow-lg shadow-brand-500/20">Restart
                            Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-topnav-layout>