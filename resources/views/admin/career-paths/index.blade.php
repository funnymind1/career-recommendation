<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <h1 class="text-2xl font-bold text-gray-900">Manage Career Paths</h1>
                <a href="{{ route('admin.career-paths.create') }}"
                    class="px-4 py-2 bg-brand-600 text-white rounded-xl shadow-sm hover:bg-brand-700 transition">
                    + Add New Career Path
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl" x-data="{ show: false }"
                    x-init="setTimeout(() => show = true, 150)" x-show="show"
                    x-transition:enter="transition ease-out duration-500 transform"
                    x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6"
                x-data="{ show: false }" x-init="setTimeout(() => show = true, 250)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <!-- Grid of Career Paths -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($careerPaths as $index => $path)
                        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100 + {{ $index }} * 50)"
                            x-show="show" x-transition:enter="transition ease-out duration-500 transform"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="rounded-2xl border border-gray-200 hover:border-brand-300 hover:shadow-lg transition bg-white flex flex-col justify-between overflow-hidden">
                            <div class="p-6 pb-4">
                                <h3 class="text-lg font-bold text-gray-900">{{ $path->title }}</h3>
                                <p class="text-sm text-gray-500 mt-2 line-clamp-3">{{ $path->description }}</p>

                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach ($path->tags as $tag)
                                        <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs rounded-lg">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500">{{ count($path->match_keywords) }} Quiz
                                    Keywords</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.career-paths.edit', $path) }}"
                                        class="text-brand-600 hover:text-brand-800 text-sm font-medium px-2 py-1 rounded hover:bg-brand-50 transition">Edit</a>
                                    <form action="{{ route('admin.career-paths.destroy', $path) }}" method="POST"
                                        onsubmit="return confirm('Delete this career path? This might affect students currently matched to it.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 text-sm font-medium px-2 py-1 rounded hover:bg-red-50 transition">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div
                                class="flex flex-col items-center justify-center py-20 px-6 bg-gray-50/50 rounded-2xl border-2 border-dashed border-gray-200">
                                <div class="w-24 h-24 bg-brand-50 rounded-3xl flex items-center justify-center mb-6">
                                    <svg class="w-12 h-12 text-brand-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">No career paths yet</h3>
                                <p class="text-gray-500 text-sm text-center max-w-sm mb-6">Add your first career path so the
                                    system can start matching students based on their quiz results.</p>
                                <a href="{{ route('admin.career-paths.create') }}"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add First Career Path
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>