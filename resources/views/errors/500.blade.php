<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Error | Career Recommendation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f5f3ff', 100: '#ede9fe', 200: '#ddd6fe', 300: '#c4b5fd',
                            400: '#a78bfa', 500: '#8b5cf6', 600: '#7c3aed', 700: '#6d28d9',
                            800: '#5b21b6', 900: '#4c1d95', 950: '#2e1065',
                        },
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], },
                }
            }
        }
    </script>
</head>

<body
    class="bg-gray-50 dark:bg-gray-900 font-sans antialiased text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full text-center">
        <div class="relative mb-8">
            <div class="text-[12rem] font-black text-amber-500/10 dark:text-amber-500/5 leading-none select-none">500
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="w-24 h-24 bg-amber-50 dark:bg-amber-900/30 rounded-3xl flex items-center justify-center shadow-xl shadow-amber-500/20 -rotate-6">
                    <svg class="w-12 h-12 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold mb-3">Something Went Wrong</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-8 leading-relaxed">We're experiencing an internal server issue.
            Our engineers have been notified and are working on it.</p>

        <div class="flex flex-col gap-3">
            <button onclick="window.location.reload()"
                class="px-6 py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl shadow-lg shadow-brand-500/25 transition-all transform hover:scale-[1.02]">Refresh
                Page</button>
            <a href="/"
                class="px-6 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-bold rounded-xl transition hover:bg-gray-50 dark:hover:bg-gray-700/50">Back
                to Home</a>
        </div>
    </div>
</body>

</html>