<x-topnav-layout>
    <div x-data="internshipApp()" x-init="setTimeout(() => ready = true, 1200)">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">My Internship Tracker</h1>
                <p class="text-gray-500 mt-1">Manage your application and stay ahead of deadlines</p>
            </div>
        </div>

        <!-- Category Filter Pills -->
        <div class="flex flex-wrap gap-2 mb-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)"
            x-show="show" x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <a href="{{ route('internships') }}"
                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 {{ !$category || $category === 'All' ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/20' : 'bg-white border border-gray-200 text-gray-600 hover:border-brand-200 hover:text-brand-600' }}">
                All
            </a>
            @foreach ($categories as $cat)
                <a href="{{ route('internships', ['category' => $cat]) }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 {{ $category === $cat ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/20' : 'bg-white border border-gray-200 text-gray-600 hover:border-brand-200 hover:text-brand-600' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Skeleton Loader (shown while loading) -->
        <div x-show="!ready" class="mb-10">
            <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Live Internships
            </h2>
            <div class="flex gap-4 overflow-x-hidden pb-4">
                @for ($i = 0; $i < 3; $i++)
                    <div
                        class="min-w-[300px] sm:min-w-[340px] bg-white rounded-2xl border border-gray-100 p-5 animate-pulse">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 bg-gray-200 rounded-xl"></div>
                            <div class="w-16 h-5 bg-gray-200 rounded-full"></div>
                        </div>
                        <div class="h-4 bg-gray-200 rounded mb-2 w-3/4"></div>
                        <div class="h-3 bg-gray-100 rounded mb-4 w-1/2"></div>
                        <div class="h-3 bg-gray-100 rounded mb-6 w-1/3"></div>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-50">
                            <div class="h-3 w-16 bg-gray-100 rounded"></div>
                            <div class="flex gap-2">
                                <div class="h-7 w-14 bg-gray-100 rounded-lg"></div>
                                <div class="h-7 w-20 bg-brand-100 rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Live Internships Section (shown when ready) -->
        <div class="mb-10" x-show="ready" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Live Internships
            </h2>

            @if ($liveInternships->count() > 0)
                <div class="flex gap-4 overflow-x-auto pb-4 -mx-4 px-4 snap-x snap-mandatory scrollbar-hide">
                    @foreach ($liveInternships as $index => $internship)
                        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 500 + {{ $index }} * 50)"
                            x-show="show" x-transition:enter="transition ease-out duration-500 transform"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="min-w-[300px] sm:min-w-[340px] bg-white rounded-2xl border border-gray-100 shadow-sm p-5 snap-start hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 flex flex-col">
                            <div class="flex items-start justify-between mb-3">
                                <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center">
                                    <span
                                        class="text-brand-600 font-bold text-sm">{{ strtoupper(substr($internship->company, 0, 2)) }}</span>
                                </div>
                                <span
                                    class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-full font-medium">{{ $internship->category }}</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ $internship->role }}</h3>
                            <p class="text-sm text-gray-500 mb-1">{{ $internship->company }}</p>
                            <div class="flex items-center gap-1 text-xs text-gray-400 mb-4">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $internship->location }}
                            </div>
                            <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-50">
                                <div class="flex items-center gap-1 text-xs text-gray-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $internship->duration ?? 'N/A' }}
                                </div>
                                <div class="flex items-center gap-2">
                                    <button @click="showDetail({{ $internship->id }})"
                                        class="px-3 py-1.5 text-xs font-medium text-brand-600 hover:bg-brand-50 rounded-lg transition">Details</button>
                                    <form method="POST" action="{{ route('internships.apply', $internship) }}">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-semibold rounded-lg shadow transition-all">Apply
                                            Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-2xl border border-gray-100 p-10 text-center">
                    <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-1">No internships in this category</h3>
                    <p class="text-gray-400 text-sm">Try selecting a different category or check back later for new
                        listings.</p>
                </div>
            @endif
        </div>

        <!-- My Applications Section -->
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 400)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <h2 class="text-lg font-bold text-gray-900 mb-4">My Applications</h2>

            @if ($myInternships->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($myInternships as $index => $internship)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition-all duration-300 cursor-pointer"
                            x-data="{ show: false }" x-init="setTimeout(() => show = true, 500 + {{ $index }} * 50)"
                            x-show="show" x-transition:enter="transition ease-out duration-500 transform"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0" @click="showDetail({{ $internship->id }})">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $internship->company }}</h3>
                                    <p class="text-sm text-gray-500">{{ $internship->role }}</p>
                                </div>
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-semibold whitespace-nowrap
                                                                                                    {{ $internship->status === 'applied' ? 'bg-blue-50 text-blue-600' : '' }}
                                                                                                    {{ $internship->status === 'interview' ? 'bg-amber-50 text-amber-600' : '' }}
                                                                                                    {{ $internship->status === 'offer_received' ? 'bg-green-50 text-green-600' : '' }}
                                                                                                ">{{ ucfirst(str_replace('_', ' ', $internship->status)) }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-xs text-gray-400">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $internship->location }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $internship->deadline->format('M d, Y') }}
                                </span>
                            </div>

                            <!-- Status Update -->
                            <div class="mt-3 pt-3 border-t border-gray-50" @click.stop>
                                <form method="POST" action="{{ route('internships.updateStatus', $internship) }}">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                        class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
                                        <option value="applied" {{ $internship->status === 'applied' ? 'selected' : '' }}>Applied
                                        </option>
                                        <option value="interview" {{ $internship->status === 'interview' ? 'selected' : '' }}>
                                            Interview</option>
                                        <option value="offer_received" {{ $internship->status === 'offer_received' ? 'selected' : '' }}>Offer Received</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-2xl border border-dashed border-gray-200 p-12 text-center">
                    <div class="relative w-20 h-20 mx-auto mb-6">
                        <div class="w-20 h-20 bg-brand-50 rounded-3xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-brand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div
                            class="absolute -bottom-1 -right-1 w-7 h-7 bg-green-400 rounded-full border-2 border-white flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">No applications yet</h3>
                    <p class="text-gray-500 text-sm max-w-xs mx-auto mb-6">You haven't applied to any internships yet.
                        Browse live listings above and hit <strong>Apply Now</strong> to get started!</p>
                    <a href="{{ route('internships') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02]">
                        Browse Internships
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>

        <!-- Detail Modal -->
        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display:none">
            <div class="fixed inset-0 bg-black/50" @click="modalOpen = false"></div>
            <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6 sm:p-8 max-h-[90vh] overflow-y-auto">
                <button @click="modalOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <template x-if="detail">
                    <div>
                        <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-brand-600 font-bold"
                                x-text="detail.company?.substring(0,2).toUpperCase()"></span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-1" x-text="detail.role"></h2>
                        <p class="text-gray-500 mb-4" x-text="detail.company"></p>
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div class="bg-gray-50 rounded-xl p-3">
                                <p class="text-xs text-gray-400 mb-0.5">Location</p>
                                <p class="text-sm font-medium text-gray-700" x-text="detail.location"></p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-3">
                                <p class="text-xs text-gray-400 mb-0.5">Duration</p>
                                <p class="text-sm font-medium text-gray-700" x-text="detail.duration || 'N/A'"></p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-3">
                                <p class="text-xs text-gray-400 mb-0.5">Category</p>
                                <p class="text-sm font-medium text-gray-700" x-text="detail.category"></p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-3">
                                <p class="text-xs text-gray-400 mb-0.5">Deadline</p>
                                <p class="text-sm font-medium text-gray-700"
                                    x-text="new Date(detail.deadline).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })">
                                </p>
                            </div>
                        </div>
                        <div class="mb-6">
                            <p class="text-xs text-gray-400 mb-1">Description</p>
                            <p class="text-sm text-gray-600 leading-relaxed"
                                x-text="detail.details || 'No description available.'"></p>
                        </div>
                        <template x-if="detail.apply_url">
                            <a :href="detail.apply_url" target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02]">
                                Apply Externally
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <script>
        function internshipApp() {
            return {
                modalOpen: false,
                detail: null,
                ready: false,
                async showDetail(id) {
                    try {
                        const response = await fetch(`/internships/${id}`);
                        this.detail = await response.json();
                        this.modalOpen = true;
                    } catch (err) {
                        console.error('Failed to load details:', err);
                    }
                }
            }
        }
    </script>
</x-topnav-layout>