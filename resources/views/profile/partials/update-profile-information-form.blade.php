<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your name, email, and profile photo.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6"
        x-data="{
              photoPreview: '{{ Auth::user()->profile_photo_url ?? '' }}',
              handlePhoto(event) {
                  const file = event.target.files[0];
                  if (!file) return;
                  const reader = new FileReader();
                  reader.onload = (e) => this.photoPreview = e.target.result;
                  reader.readAsDataURL(file);
              }
          }">
        @csrf
        @method('patch')

        {{-- Profile Photo Picker --}}
        <div class="flex flex-col items-start gap-4">
            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Profile Photo</label>
            <div class="flex items-center gap-5">
                {{-- Avatar Preview --}}
                <div class="relative group cursor-pointer" @click="$refs.photoInput.click()">
                    <template x-if="photoPreview">
                        <img :src="photoPreview" alt="Profile Photo"
                            class="w-20 h-20 rounded-2xl object-cover border-2 border-brand-200 shadow-md group-hover:opacity-80 transition">
                    </template>
                    <template x-if="!photoPreview">
                        <div
                            class="w-20 h-20 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center text-white text-2xl font-bold shadow-md group-hover:opacity-80 transition">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </template>
                    {{-- Camera overlay --}}
                    <div
                        class="absolute inset-0 rounded-2xl bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <button type="button" @click="$refs.photoInput.click()"
                        class="px-4 py-2 text-sm font-medium text-brand-600 dark:text-brand-400 border border-brand-200 dark:border-brand-700 rounded-xl hover:bg-brand-50 dark:hover:bg-brand-900/20 transition">
                        Change Photo
                    </button>
                    <p class="text-xs text-gray-400 mt-1.5">JPG, PNG, GIF or WebP. Max 2MB.</p>
                </div>
            </div>
            <input type="file" name="profile_photo" x-ref="photoInput" @change="handlePhoto($event)" accept="image/*"
                class="hidden">
            <x-input-error class="mt-1" :messages="$errors->get('profile_photo')" />
        </div>

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>