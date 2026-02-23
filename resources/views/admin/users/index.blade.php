<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <h1 class="text-2xl font-bold text-gray-900">Manage Students</h1>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100"
                x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Student Name</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Email</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Joined Date</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($users as $index => $student)
                                <tr class="hover:bg-gray-50 transition" x-data="{ show: false }"
                                    x-init="setTimeout(() => show = true, 300 + {{ $index }} * 30)" x-show="show"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0">
                                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center font-bold text-xs uppercase">
                                            {{ substr($student->name, 0, 2) }}
                                        </div>
                                        {{ $student->name }}
                                    </td>
                                    <td class="px-6 py-4">{{ $student->email }}</td>
                                    <td class="px-6 py-4">
                                        {{ $student->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.users.show', $student) }}"
                                            class="text-brand-600 hover:text-brand-900 font-medium px-3 py-1.5 rounded-lg hover:bg-brand-50 transition">View
                                            Details</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="flex flex-col items-center justify-center py-20 px-6">
                                            <div class="relative mb-6">
                                                <div
                                                    class="w-24 h-24 bg-brand-50 rounded-3xl flex items-center justify-center">
                                                    <svg class="w-12 h-12 text-brand-300" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                </div>
                                                <div
                                                    class="absolute -top-2 -right-2 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900 mb-2">No students yet</h3>
                                            <p class="text-gray-500 text-sm text-center max-w-sm">Students who register on
                                                the platform will appear here. Share the platform link to get started.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</x-app-layout>