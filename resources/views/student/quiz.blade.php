<x-topnav-layout>
    <div x-data="quizApp()" class="max-w-3xl mx-auto">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <a href="{{ route('dashboard') }}" class="hover:text-brand-600 transition">Home</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-gray-900 font-medium">Skill Assessment</span>
        </div>

        <!-- Progress Bar -->
        <div class="mb-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-600">Question <span x-text="currentQuestion + 1"></span> of
                    {{ count($questions) }}</span>
                <span class="text-sm font-medium text-brand-600"
                    x-text="Math.round(((currentQuestion + 1) / {{ count($questions) }}) * 100) + '%'"></span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-brand-600 h-2.5 rounded-full transition-all duration-500 ease-out"
                    :style="'width: ' + ((currentQuestion + 1) / {{ count($questions) }}) * 100 + '%'"></div>
            </div>
        </div>

        <!-- Question Card -->
        <form action="{{ route('quiz.submit') }}" method="POST" @submit="handleSubmit($event)" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 300)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            @csrf
            @foreach ($questions as $index => $question)
                <div x-cloak x-show="currentQuestion === {{ $index }}" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">{{ $question->question_text }}</h2>

                        <div class="space-y-3">
                            @foreach ($question->options as $optionIndex => $option)
                                <label x-data="{ show: false }"
                                    x-init="setTimeout(() => show = true, 400 + {{ $optionIndex }} * 50)" x-show="show"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200 hover:border-brand-200 hover:bg-brand-50/50"
                                    :class="answers[{{ $question->id }}] == {{ $optionIndex }} ? 'border-brand-500 bg-brand-50 ring-1 ring-brand-500' : 'border-gray-100 bg-gray-50'">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $optionIndex }}"
                                        x-model="answers[{{ $question->id }}]"
                                        class="w-4 h-4 text-brand-600 border-gray-300 focus:ring-brand-500">
                                    <span class="text-sm font-medium text-gray-700">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Navigation Buttons -->
            <div class="flex items-center justify-between mt-6">
                <button type="button" x-show="currentQuestion > 0" @click="prevQuestion()"
                    class="flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Previous
                </button>
                <div x-show="currentQuestion === 0"></div>

                <button type="button" x-show="currentQuestion < {{ count($questions) - 1 }}" @click="nextQuestion()"
                    :disabled="answers[questionIds[currentQuestion]] === undefined"
                    :class="answers[questionIds[currentQuestion]] === undefined ? 'opacity-50 cursor-not-allowed' : 'hover:bg-brand-700 transform hover:scale-[1.02] active:scale-[0.98]'"
                    class="flex items-center gap-2 px-5 py-2.5 bg-brand-600 text-white font-medium rounded-xl shadow-lg shadow-brand-600/20 transition-all">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <button type="submit" x-show="currentQuestion === {{ count($questions) - 1 }}" :disabled="!allAnswered"
                    :class="!allAnswered ? 'opacity-50 cursor-not-allowed' : 'hover:bg-green-600 transform hover:scale-[1.02] active:scale-[0.98]'"
                    class="flex items-center gap-2 px-6 py-2.5 bg-green-500 text-white font-semibold rounded-xl shadow-lg shadow-green-500/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Submit Quiz
                </button>
            </div>
        </form>
    </div>

    <script>
        function quizApp() {
            return {
                currentQuestion: 0,
                answers: {},
                questionIds: @json($questions->pluck('id')->toArray()),
                get allAnswered() {
                    return this.questionIds.every(id => this.answers[id] !== undefined);
                },
                nextQuestion() {
                    if (this.currentQuestion < this.questionIds.length - 1) {
                        this.currentQuestion++;
                    }
                },
                prevQuestion() {
                    if (this.currentQuestion > 0) {
                        this.currentQuestion--;
                    }
                },
                handleSubmit(e) {
                    if (!this.allAnswered) {
                        e.preventDefault();
                        alert('Please answer all questions before submitting.');
                    }
                }
            }
        }
    </script>
</x-topnav-layout>