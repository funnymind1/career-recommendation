<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center gap-4" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <a href="{{ route('admin.career-paths.index') }}"
                    class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 transition text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Edit Career Path: {{ $careerPath->title }}</h1>
            </div>

            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 250)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <form action="{{ route('admin.career-paths.update', $careerPath) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Career Title</label>
                        <input type="text" name="title" value="{{ old('title', $careerPath->title) }}" required
                            class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                        @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="3" required
                            class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">{{ old('description', $careerPath->description) }}</textarea>
                        @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Display Tags (Comma
                                separated)</label>
                            <input type="text" name="tags" value="{{ old('tags', implode(', ', $careerPath->tags)) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('tags') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Quiz Match Keywords (Comma
                                separated)</label>
                            <input type="text" name="match_keywords"
                                value="{{ old('match_keywords', implode(', ', $careerPath->match_keywords)) }}" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('match_keywords') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-gray-100">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Average Salary</label>
                            <input type="text" name="average_salary"
                                value="{{ old('average_salary', $careerPath->average_salary) }}" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('average_salary') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Required Education</label>
                            <input type="text" name="required_education"
                                value="{{ old('required_education', $careerPath->required_education) }}" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('required_education') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Projected Growth</label>
                            <input type="text" name="projected_growth"
                                value="{{ old('projected_growth', $careerPath->projected_growth) }}" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('projected_growth') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100 mt-8">
                        <a href="{{ route('admin.career-paths.index') }}"
                            class="px-5 py-2.5 text-gray-700 font-medium hover:bg-gray-50 rounded-xl transition">Cancel</a>
                        <button type="submit"
                            class="px-5 py-2.5 bg-brand-600 text-white font-medium rounded-xl shadow-sm hover:bg-brand-700 transition">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>