<x-guest-layout>
    <div
        x-data="{ tab: new URLSearchParams(window.location.search).get('tab') === 'register' ? 'register' : '{{ old('tab', 'login') }}' }">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="p-8">
                <!-- Title -->
                <h1 class="text-2xl font-extrabold text-gray-900 mb-1">Welcome Back</h1>
                <p class="text-gray-400 text-sm mb-8">Enter your details to access your dashboard</p>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200 mb-6">
                    <button @click="tab = 'login'"
                        :class="tab === 'login' ? 'text-brand-600 border-brand-600 font-semibold' : 'text-gray-400 border-transparent hover:text-gray-500'"
                        class="pb-3 mr-6 text-sm border-b-2 transition-all duration-200 focus:outline-none">
                        Login
                    </button>
                    <button @click="tab = 'register'"
                        :class="tab === 'register' ? 'text-brand-600 border-brand-600 font-semibold' : 'text-gray-400 border-transparent hover:text-gray-500'"
                        class="pb-3 text-sm border-b-2 transition-all duration-200 focus:outline-none">
                        Create Account
                    </button>
                </div>

                <!-- Login Form -->
                <div x-show="tab === 'login'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email
                                    Address</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autofocus autocomplete="username"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                    placeholder="you@example.com">
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
                                Login
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Register Form -->
                <div x-show="tab === 'register'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="reg_name" class="block text-sm font-medium text-gray-700 mb-1.5">Full
                                    Name</label>
                                <input id="reg_name" type="text" name="name" value="{{ old('name') }}" required
                                    autofocus autocomplete="name"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                    placeholder="John Doe">
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>
                            <div>
                                <label for="reg_email" class="block text-sm font-medium text-gray-700 mb-1.5">Email
                                    Address</label>
                                <input id="reg_email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="username"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                    placeholder="you@example.com">
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>
                            <div>
                                <label for="reg_password"
                                    class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                                <input id="reg_password" type="password" name="password" required
                                    autocomplete="new-password"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                    placeholder="••••••••">
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>
                            <div>
                                <label for="reg_password_confirmation"
                                    class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password</label>
                                <input id="reg_password_confirmation" type="password" name="password_confirmation"
                                    required autocomplete="new-password"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition placeholder-gray-400"
                                    placeholder="••••••••">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                            </div>
                            <button type="submit"
                                class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/30 transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.99]">
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>