<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center gap-4" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <a href="{{ route('admin.internships.index') }}"
                    class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 transition text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Edit Internship: {{ $internship->role }} at
                    {{ $internship->company }}
                </h1>
            </div>

            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 250)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <form action="{{ route('admin.internships.update', $internship) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                            <input type="text" name="company" value="{{ old('company', $internship->company) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('company') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Job Role</label>
                            <input type="text" name="role" value="{{ old('role', $internship->role) }}" required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('role') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                            <input type="text" name="location" value="{{ old('location', $internship->location) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('location') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <input type="text" name="category" value="{{ old('category', $internship->category) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('category') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                            <input type="text" name="duration" value="{{ old('duration', $internship->duration) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('duration') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status"
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                                <option value="live" {{ old('status', $internship->status) === 'live' ? 'selected' : '' }}>Live (Open)</option>
                                <option value="closed" {{ old('status', $internship->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                            @error('status') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Application Deadline</label>
                            <!-- Format date for HTML input type="date" -->
                            <input type="date" name="deadline"
                                value="{{ old('deadline', \Carbon\Carbon::parse($internship->deadline)->format('Y-m-d')) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('deadline') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Application URL</label>
                            <input type="url" name="apply_url" value="{{ old('apply_url', $internship->apply_url) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">
                            @error('apply_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Job Details & Requirements</label>
                        <textarea name="details" rows="5" required
                            class="w-full rounded-xl border-gray-200 focus:border-brand-500 focus:ring-brand-500">{{ old('details', $internship->details) }}</textarea>
                        @error('details') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.internships.index') }}"
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