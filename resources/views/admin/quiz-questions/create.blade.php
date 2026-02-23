<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Back + Title --}}
            <div class="mb-6 flex items-center gap-4" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <a href="{{ route('admin.quiz-questions.index') }}"
                    class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 transition text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Add New Quiz Question</h1>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 250)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

                <form action="{{ route('admin.quiz-questions.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Question Text --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Question Text</label>
                        <textarea name="question_text" rows="3" required
                            placeholder="e.g. Which activity do you enjoy the most in your free time?"
                            class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">{{ old('question_text') }}</textarea>
                        @error('question_text') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Answer Options --}}
                    <div class="border-t border-gray-100 pt-6">
                        <p class="text-sm font-semibold text-gray-700 mb-4">Answer Options <span
                                class="font-normal text-gray-400">(Always provide exactly 4)</span></p>
                        <div class="space-y-3">
                            @foreach (['A', 'B', 'C', 'D'] as $i => $letter)
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 flex-shrink-0 flex items-center justify-center rounded-lg text-xs font-bold
                                            {{ $i === 0 ? 'bg-brand-600 text-white' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $letter }}
                                    </span>
                                    <input type="text" name="option_{{ $i }}" value="{{ old('option_' . $i) }}"
                                        placeholder="Option {{ $letter }}" required
                                        class="flex-1 rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500 text-sm">
                                    @error('option_' . $i) <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Correct Option + Category + Order --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-t border-gray-100 pt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Correct Option</label>
                            <select name="correct_option" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                                @foreach (['A (index 0)', 'B (index 1)', 'C (index 2)', 'D (index 3)'] as $i => $label)
                                    <option value="{{ $i }}" {{ old('correct_option') == $i ? 'selected' : '' }}>{{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-400 mt-1">Which option is the "correct" answer used for scoring.
                            </p>
                            @error('correct_option') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <input type="text" name="category" value="{{ old('category') }}"
                                placeholder="e.g. general_interest" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            <p class="text-xs text-gray-400 mt-1">Use underscores, e.g. <code>work_style</code></p>
                            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                            <input type="number" name="order" value="{{ old('order', $nextOrder) }}" min="1" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            <p class="text-xs text-gray-400 mt-1">Lower numbers appear first in the quiz.</p>
                            @error('order') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Info box about matching --}}
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 text-sm text-amber-800">
                        <p class="font-semibold mb-1">💡 How quiz matching works</p>
                        <p>Each answer option maps to a career category by its position:</p>
                        <ul class="mt-1 space-y-0.5 text-xs">
                            <li><strong>A (0)</strong> → Tech / Programming careers (e.g. Software Engineer)</li>
                            <li><strong>B (1)</strong> → Data / Analytics careers (e.g. Data Scientist)</li>
                            <li><strong>C (2)</strong> → Design / Creative careers (e.g. Product Designer)</li>
                            <li><strong>D (3)</strong> → Business / Finance / Marketing careers</li>
                        </ul>
                        <p class="mt-2 text-xs">Write option A to attract tech-minded students, B for data lovers, C for
                            creatives, and D for business-oriented students.</p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.quiz-questions.index') }}"
                            class="px-5 py-2.5 text-gray-700 font-medium hover:bg-gray-50 rounded-xl transition">Cancel</a>
                        <button type="submit"
                            class="px-5 py-2.5 bg-brand-600 text-white font-medium rounded-xl shadow-sm hover:bg-brand-700 transition">
                            Save Question
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>