<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-6 flex justify-between items-center" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Quiz Questions</h1>
                    <p class="text-sm text-gray-500 mt-0.5">{{ $questions->count() }} question{{ $questions->count() !== 1 ? 's' : '' }} total</p>
                </div>
                <a href="{{ route('admin.quiz-questions.create') }}"
                    class="px-4 py-2 bg-brand-600 text-white rounded-xl shadow-sm hover:bg-brand-700 transition">
                    + Add Question
                </a>
            </div>

            {{-- Flash message --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl"
                    x-data="{ show: false }" x-init="setTimeout(() => show = true, 150)" x-show="show"
                    x-transition:enter="transition ease-out duration-500 transform"
                    x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100"
                x-data="{ show: false }" x-init="setTimeout(() => show = true, 250)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

                @if ($questions->isEmpty())
                    <div class="flex flex-col items-center justify-center py-20 px-6 bg-gray-50/50">
                        <div class="w-20 h-20 bg-brand-50 rounded-3xl flex items-center justify-center mb-5">
                            <svg class="w-10 h-10 text-brand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">No questions yet</h3>
                        <p class="text-gray-500 text-sm text-center max-w-sm mb-6">Add quiz questions so students can take the career quiz.</p>
                        <a href="{{ route('admin.quiz-questions.create') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all transform hover:scale-[1.02]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add First Question
                        </a>
                    </div>
                @else
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-10">#</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Question</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Options</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($questions as $index => $question)
                                <tr class="hover:bg-gray-50/60 transition" x-data="{ show: false }"
                                    x-init="setTimeout(() => show = true, 100 + {{ $index }} * 40)"
                                    x-show="show"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-400">
                                        {{ $question->order }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-medium text-gray-900 line-clamp-2">{{ $question->question_text }}</p>
                                        <p class="text-xs text-green-600 mt-0.5">
                                            ✓ Correct: {{ $question->options[$question->correct_option] ?? '—' }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 hidden md:table-cell">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium bg-brand-50 text-brand-700">
                                            {{ str_replace('_', ' ', $question->category) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 hidden lg:table-cell">
                                        <ul class="text-xs text-gray-500 space-y-0.5">
                                            @foreach ($question->options as $i => $option)
                                                <li class="{{ $i === $question->correct_option ? 'text-green-600 font-semibold' : '' }}">
                                                    {{ chr(65 + $i) }}. {{ $option }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.quiz-questions.edit', $question) }}"
                                                class="text-brand-600 hover:text-brand-800 text-sm font-medium px-2 py-1 rounded hover:bg-brand-50 transition">Edit</a>
                                            <form action="{{ route('admin.quiz-questions.destroy', $question) }}" method="POST"
                                                onsubmit="return confirm('Delete this question? This will affect quiz scoring.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 text-sm font-medium px-2 py-1 rounded hover:bg-red-50 transition">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
