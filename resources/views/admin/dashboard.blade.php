<x-app-layout>
    <!-- Welcome Header -->
    <div class="mb-8 flex justify-between items-center" x-data="{ show: false }"
        x-init="setTimeout(() => show = true, 100)" x-show="show"
        x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Platform overview and analytics</p>
        </div>
        <div class="flex gap-3">
            <button onclick="window.location.reload()"
                class="p-2 text-gray-400 hover:text-brand-600 transition bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Top Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Total Students -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-1"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-brand-50 dark:bg-brand-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Total Students</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $studentCount }}</p>
                </div>
            </div>
            <div class="w-full bg-gray-100 dark:bg-gray-700 h-1 rounded-full overflow-hidden">
                <div class="bg-brand-500 h-full w-full"></div>
            </div>
        </div>

        <!-- Quiz Completion -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-1"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-purple-50 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Quiz Completion</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $quizCompletionRate }}%</p>
                </div>
            </div>
            <div class="w-full bg-gray-100 dark:bg-gray-700 h-1 rounded-full overflow-hidden">
                <div class="bg-purple-500 h-full" style="width:{{ $quizCompletionRate }}%"></div>
            </div>
        </div>

        <!-- Total Internships -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-1"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 400)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Active Internships</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $internshipCount }}</p>
                </div>
            </div>
            <div class="w-full bg-gray-100 dark:bg-gray-700 h-1 rounded-full overflow-hidden">
                <div class="bg-emerald-500 h-full w-full"></div>
            </div>
        </div>

        <!-- Career Paths -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-1"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 500)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-amber-50 dark:bg-amber-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-500 dark:text-amber-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">Career Paths</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $careerPathCount }}</p>
                </div>
            </div>
            <div class="w-full bg-gray-100 dark:bg-gray-700 h-1 rounded-full overflow-hidden">
                <div class="bg-amber-500 h-full w-full"></div>
            </div>
        </div>
    </div>

    <!-- Quick Access Management Links -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8" x-data="{ show: false }"
        x-init="setTimeout(() => show = true, 550)" x-show="show"
        x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

        <a href="{{ route('admin.career-paths.index') }}"
            class="flex items-center gap-4 bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
            <div
                class="w-10 h-10 bg-amber-50 dark:bg-amber-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-amber-500 dark:text-amber-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-brand-600 transition">
                    Manage Career Paths</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Add, edit or remove career paths</p>
            </div>
            <svg class="w-4 h-4 text-gray-400 group-hover:text-brand-500 transition flex-shrink-0" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="{{ route('admin.quiz-questions.index') }}"
            class="flex items-center gap-4 bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
            <div
                class="w-10 h-10 bg-purple-50 dark:bg-purple-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-brand-600 transition">
                    Manage Quiz Questions</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Add, edit or delete quiz questions</p>
            </div>
            <svg class="w-4 h-4 text-gray-400 group-hover:text-brand-500 transition flex-shrink-0" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="{{ route('admin.internships.index') }}"
            class="flex items-center gap-4 bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
            <div
                class="w-10 h-10 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-brand-600 transition">
                    Manage Internships</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Post and manage internship listings</p>
            </div>
            <svg class="w-4 h-4 text-gray-400 group-hover:text-brand-500 transition flex-shrink-0" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <!-- Analytics Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8" x-data="{ show: false }"
        x-init="setTimeout(() => show = true, 600)" x-show="show"
        x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

        <!-- Student Growth Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-gray-900 dark:text-white">Student Registration (Last 7 Days)</h3>
            </div>
            <div class="h-[300px] w-full">
                <canvas id="registrationChart"></canvas>
            </div>
        </div>

        <!-- Top Career Matches Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-gray-900 dark:text-white">Most Matched Career Paths</h3>
            </div>
            <div class="h-[300px] w-full">
                <canvas id="careerChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Registration Chart
            const regCtx = document.getElementById('registrationChart').getContext('2d');
            new Chart(regCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($registrationChartData['labels']) !!},
                    datasets: [{
                        label: 'Registrations',
                        data: {!! json_encode($registrationChartData['data']) !!},
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#6366f1',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 },
                            grid: { color: 'rgba(0,0,0,0.05)' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });

            // Career Chart
            const careerCtx = document.getElementById('careerChart').getContext('2d');
            new Chart(careerCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($careerChartData['labels']) !!},
                    datasets: [{
                        label: 'Top Matches',
                        data: {!! json_encode($careerChartData['data']) !!},
                        backgroundColor: [
                            '#6366f1', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'
                        ],
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: { precision: 0 },
                            grid: { color: 'rgba(0,0,0,0.05)' }
                        },
                        y: {
                            grid: { display: false }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>