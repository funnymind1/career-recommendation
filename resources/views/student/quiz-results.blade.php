<x-topnav-layout>
    <div class="max-w-4xl mx-auto">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                    <a href="{{ route('dashboard') }}" class="hover:text-brand-600 transition">Dashboard</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-900 font-medium">Results</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Your Career Match Results 🎯</h1>
                <p class="text-gray-500 mt-1">Based on your quiz answers, here are your best-fit career paths.</p>
            </div>
            <a href="{{ route('quiz') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-brand-600 border border-brand-200 rounded-xl hover:bg-brand-50 transition whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Retake Quiz
            </a>
        </div>

        {{-- Score Summary Card --}}
        <div class="bg-gradient-to-br from-brand-600 to-brand-800 rounded-3xl p-8 mb-10 text-white relative overflow-hidden"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-show="show"
            x-transition:enter="transition ease-out duration-700 transform"
            x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/5 rounded-full"></div>
            <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-white/5 rounded-full"></div>
            <div class="relative flex flex-col sm:flex-row items-start sm:items-center gap-6">
                {{-- Score Circle --}}
                <div class="relative w-24 h-24 flex-shrink-0">
                    <svg class="w-24 h-24 -rotate-90" viewBox="0 0 36 36">
                        <path class="fill-none stroke-white/20" stroke-width="3"
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <path class="fill-none stroke-white" stroke-width="3" stroke-linecap="round"
                            stroke-dasharray="{{ $result->score }}, 100"
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-2xl font-extrabold">{{ $result->score }}%</span>
                    </div>
                </div>
                <div>
                    <p class="text-white/70 text-sm uppercase tracking-wider font-semibold mb-1">Overall Quiz Score</p>
                    <h2 class="text-2xl font-bold mb-2">
                        @if($result->score >= 80) Excellent! Outstanding result! 🏆
                        @elseif($result->score >= 60) Great job! Strong performance! 👍
                        @elseif($result->score >= 40) Good effort! Keep growing! 💪
                        @else Keep learning! You've got this! 📚
                        @endif
                    </h2>
                    <p class="text-white/70 text-sm">
                        Completed {{ $result->created_at->diffForHumans() }} ·
                        {{ count($result->career_matches) }} career paths analysed
                    </p>
                </div>
            </div>
        </div>

        {{-- Career Match Results --}}
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 400)" x-show="show"
            x-transition:enter="transition ease-out duration-700 transform"
            x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Career Path Matches</h2>

            @if($matches->isEmpty())
                <div class="bg-white rounded-2xl border border-dashed border-gray-200 p-12 text-center">
                    <p class="text-gray-500">No career paths found. Ask your admin to add career paths to the system.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($matches as $index => $match)
                        @php
                            $pct = $match['match_percent'];
                            $color = $pct >= 70 ? 'brand' : ($pct >= 40 ? 'amber' : 'gray');
                            $rank = $index + 1;
                        @endphp
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200"
                            style="animation-delay: {{ $index * 100 }}ms">
                            <div class="flex items-start justify-between gap-4 mb-4">
                                <div class="flex items-center gap-4">
                                    {{-- Rank Badge --}}
                                    <div
                                        class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-bold flex-shrink-0
                                                {{ $rank === 1 ? 'bg-amber-100 text-amber-700' : ($rank === 2 ? 'bg-gray-100 text-gray-600' : ($rank === 3 ? 'bg-orange-100 text-orange-700' : 'bg-gray-50 text-gray-400')) }}">
                                        {{ $rank === 1 ? '🥇' : ($rank === 2 ? '🥈' : ($rank === 3 ? '🥉' : '#' . $rank)) }}
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-900 text-lg">{{ $match['career_path']->title }}</h3>
                                        <p class="text-gray-500 text-sm line-clamp-2">{{ $match['career_path']->description }}
                                        </p>
                                    </div>
                                </div>
                                {{-- Match % --}}
                                <div class="text-right flex-shrink-0">
                                    <span
                                        class="text-2xl font-extrabold {{ $pct >= 70 ? 'text-brand-600' : ($pct >= 40 ? 'text-amber-500' : 'text-gray-400') }}">{{ $pct }}%</span>
                                    <p class="text-xs text-gray-400 font-medium">match</p>
                                </div>
                            </div>

                            {{-- Tags --}}
                            @if(!empty($match['career_path']->tags))
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach($match['career_path']->tags as $tag)
                                        <span
                                            class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs rounded-lg font-medium">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Progress Bar --}}
                            <div class="w-full bg-gray-100 rounded-full h-2 mb-4">
                                <div class="h-2 rounded-full transition-all duration-1000 ease-out
                                            {{ $pct >= 70 ? 'bg-brand-500' : ($pct >= 40 ? 'bg-amber-400' : 'bg-gray-300') }}"
                                    style="width: {{ $pct }}%" x-data
                                    x-init="$el.style.width = '0%'; setTimeout(() => $el.style.width = '{{ $pct }}%', 600 + {{ $index }} * 100)">
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-xs font-semibold px-2.5 py-1 rounded-full
                                            {{ $pct >= 70 ? 'bg-green-50 text-green-700' : ($pct >= 40 ? 'bg-amber-50 text-amber-700' : 'bg-gray-100 text-gray-500') }}">
                                    {{ $pct >= 70 ? '✓ Strong Match' : ($pct >= 40 ? '~ Possible Match' : '○ Low Match') }}
                                </span>
                                <a href="{{ route('career-paths.show', $match['career_path']) }}"
                                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-600 hover:text-brand-700 transition group">
                                    Explore Path
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Bottom CTA --}}
                <div class="mt-10 bg-gray-50 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <h3 class="font-bold text-gray-900">Ready to take action?</h3>
                        <p class="text-sm text-gray-500">Browse internships aligned with your top career matches.</p>
                    </div>
                    <a href="{{ route('internships') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02] whitespace-nowrap">
                        Browse Internships
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-topnav-layout>