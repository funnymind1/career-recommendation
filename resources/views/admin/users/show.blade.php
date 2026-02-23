<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mb-6 flex items-center gap-4"
                 x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" 
                 x-show="show" x-transition:enter="transition ease-out duration-500 transform" 
                 x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <a href="{{ route('admin.users.index') }}"
                    class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 transition text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Student Profile: {{ $user->name }}</h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Personal Info -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm col-span-1 h-fit"
                     x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" 
                     x-show="show" x-transition:enter="transition ease-out duration-500 transform" 
                     x-transition:enter-start="opacity-0 translate-x-[-20px]" x-transition:enter-end="opacity-100 translate-x-0">
                    <div
                        class="w-16 h-16 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center font-bold text-xl uppercase mb-4">
                        {{ substr($user->name, 0, 2) }}
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">{{ $user->name }}</h2>
                    <p class="text-gray-500 mb-6">{{ $user->email }}</p>

                    <div class="space-y-4 pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Joined</p>
                            <p class="font-medium text-gray-900">{{ $user->created_at->format('F j, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Latest Quiz Score
                            </p>
                            <p class="font-medium {{ $latestQuiz ? 'text-brand-600' : 'text-gray-500' }}">
                                {{ $latestQuiz ? $latestQuiz->score . '%' : 'Not taken yet' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Top Match</p>
                            @if ($latestQuiz && count($latestQuiz->career_matches) > 0)
                                @php
                                    $topMatchId = collect($latestQuiz->career_matches)->sortByDesc('match_percent')->first()['career_path_id'];
                                    $topMatchName = \App\Models\CareerPath::find($topMatchId)->title ?? 'Unknown';
                                @endphp
                                <p class="font-medium text-gray-900">{{ $topMatchName }}</p>
                            @else
                                <p class="text-gray-500">No match data</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Tracked Internships -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm lg:col-span-2"
                     x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)" 
                     x-show="show" x-transition:enter="transition ease-out duration-500 transform" 
                     x-transition:enter-start="opacity-0 translate-x-[20px]" x-transition:enter-end="opacity-100 translate-x-0">
                    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Tracked Applications
                    </h2>

                    @if ($internships->count() > 0)
                        <div class="space-y-3">
                            @foreach ($internships as $internship)
                                <div class="p-4 rounded-xl border border-gray-100 flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-gray-900">{{ $internship->role }}</h3>
                                        <p class="text-sm text-gray-500">{{ $internship->company }} &bull; Applied:
                                            {{ $internship->created_at->format('M d') }}</p>
                                    </div>
                                    <div class="text-sm font-medium px-3 py-1 rounded-full 
                                                {{ $internship->status === 'applied' ? 'bg-blue-50 text-blue-700' : '' }}
                                                {{ $internship->status === 'interview' ? 'bg-yellow-50 text-yellow-700' : '' }}
                                                {{ $internship->status === 'offer_received' ? 'bg-green-50 text-green-700' : '' }}
                                            ">
                                        {{ ucwords(str_replace('_', ' ', $internship->status)) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div
                            class="text-center py-8 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                            This student has not tracked any applications yet.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>