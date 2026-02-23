<x-guest-layout>
    <div class="max-w-md w-full mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-8">
                <!-- Title -->
                <h1 class="text-2xl font-extrabold text-gray-900 mb-1">Admin Portal</h1>
                <p class="text-gray-400 text-sm mb-8">Secure login for administrators</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Admin
                                Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                autocomplete="username"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                placeholder="admin@example.com">
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                            <input id="password" type="password" name="password" required
                                autocomplete="current-password"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                placeholder="••••••••">
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember"
                                    class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                                <span class="ml-2 text-sm text-gray-400">Remember me</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-brand-600 hover:text-brand-700 font-medium">Forgot Password?</a>
                            @endif
                        </div>
                        <button type="submit"
                            class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/30 transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.99]">
                            Login to Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>