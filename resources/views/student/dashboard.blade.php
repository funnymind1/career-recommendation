<x-app-layout>
    <!-- Welcome Header -->
    <div class="mb-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" x-show="show"
        x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}! 👋</h1>
        <p class="text-gray-500 mt-1">Here's your career journey overview</p>
    </div>

    <!-- Top Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Skill Assessment CTA -->
        <div class="bg-gradient-to-br from-brand-600 to-brand-700 rounded-2xl p-5 text-white shadow-lg shadow-brand-600/20"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <p class="text-white/80 text-xs font-medium">Quiz Score</p>
                    <p class="text-2xl font-bold">{{ $quizScore }}%</p>
                </div>
            </div>
            <a href="{{ route('quiz') }}"
                class="inline-flex items-center gap-1 text-sm font-medium text-white/90 hover:text-white transition">
                {{ $latestQuiz ? 'Retake Quiz' : 'Start Assessment' }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <!-- Profile Completion -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 300)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="relative w-12 h-12">
                    <svg class="w-12 h-12 transform -rotate-90" viewBox="0 0 48 48">
                        <circle cx="24" cy="24" r="20" fill="none" stroke="#e5e7eb" stroke-width="4" />
                        <circle cx="24" cy="24" r="20" fill="none" stroke="#2563eb" stroke-width="4"
                            stroke-dasharray="{{ 125.6 * $profileCompletion / 100 }} 125.6" stroke-linecap="round" />
                    </svg>
                    <span
                        class="absolute inset-0 flex items-center justify-center text-xs font-bold text-gray-700">{{ $profileCompletion }}%</span>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-medium">Profile</p>
                    <p class="text-lg font-bold text-gray-900">Complete</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="text-sm text-brand-600 hover:text-brand-700 font-medium">Edit
                Profile →</a>
        </div>

        <!-- Top Career Match -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 400)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-medium">Top Match</p>
                    <p class="text-lg font-bold text-gray-900 truncate">{{ $topMatch ? $topMatch->title : '—' }}</p>
                </div>
            </div>
            @if ($topMatch)
                <p class="text-sm text-brand-600 font-semibold">{{ $topMatchPercent }}% match</p>
            @else
                <p class="text-sm text-gray-400">Take the quiz first</p>
            @endif
        </div>

        <!-- Internship Status -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 500)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-medium">Internships</p>
                    <p class="text-lg font-bold text-gray-900">{{ $upcomingInternships->count() }} tracked</p>
                </div>
            </div>
            <a href="{{ route('internships') }}" class="text-sm text-brand-600 hover:text-brand-700 font-medium">Browse
                All →</a>
        </div>
    </div>

    <!-- Upcoming Deadlines -->
    @if ($upcomingInternships->count() > 0)
        <div class="mb-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 600)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Upcoming Deadlines</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($upcomingInternships as $internship)
                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $internship->company }}</h3>
                                <p class="text-sm text-gray-500">{{ $internship->role }}</p>
                            </div>
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold
                                                        {{ $internship->status === 'applied' ? 'bg-blue-50 text-blue-600' : '' }}
                                                        {{ $internship->status === 'interview' ? 'bg-amber-50 text-amber-600' : '' }}
                                                        {{ $internship->status === 'offer_received' ? 'bg-green-50 text-green-600' : '' }}
                                                    ">{{ ucfirst(str_replace('_', ' ', $internship->status)) }}</span>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Deadline: {{ $internship->deadline->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Recommended Careers -->
    <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 700)" x-show="show"
        x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">Recommended careers for you</h2>
            <a href="#" class="text-gray-400 hover:text-brand-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
        @php
            $careerGradients = [
                'from-blue-600 via-indigo-600 to-purple-700',
                'from-violet-600 via-purple-600 to-fuchsia-700',
                'from-cyan-600 via-blue-600 to-indigo-700',
                'from-emerald-600 via-teal-600 to-cyan-700',
                'from-orange-500 via-red-500 to-pink-600',
                'from-pink-600 via-rose-600 to-red-700',
            ];
            $careerIcons = [
                'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
                'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
            ];
            $matchPercents = [80, 90, 75, 70, 65, 60];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($recommendedCareers as $index => $career)
                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <!-- Gradient Image Header -->
                    <div
                        class="h-40 bg-gradient-to-br {{ $careerGradients[$index % count($careerGradients)] }} relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="{{ $careerIcons[$index % count($careerIcons)] }}" />
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <!-- Card Body -->
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900">{{ $career->title }}</h3>
                            <span
                                class="text-sm font-bold text-red-500">{{ $matchPercents[$index % count($matchPercents)] }}%
                                match</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $career->description }}</p>
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @foreach ($career->tags as $tag)
                                <span
                                    class="px-2.5 py-0.5 bg-gray-100 text-gray-700 text-xs rounded-full font-medium">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <a href="#"
                            class="block w-full text-center py-2.5 border border-brand-200 text-brand-600 font-medium text-sm rounded-xl hover:bg-brand-50 transition">Learn
                            more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>