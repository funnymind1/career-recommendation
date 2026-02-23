<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center" x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 100)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <h1 class="text-2xl font-bold text-gray-900">Manage Internships</h1>
                <a href="{{ route('admin.internships.create') }}"
                    class="px-4 py-2 bg-brand-600 text-white rounded-xl shadow-sm hover:bg-brand-700 transition">
                    + Add New Internship
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl" x-data="{ show: false }"
                    x-init="setTimeout(() => show = true, 150)" x-show="show"
                    x-transition:enter="transition ease-out duration-500 transform"
                    x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100"
                x-data="{ show: false }" x-init="setTimeout(() => show = true, 250)" x-show="show"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Company</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Role</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Category</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Deadline</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Status</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($internships as $index => $internship)
                                <tr class="hover:bg-gray-50 transition" x-data="{ show: false }"
                                    x-init="setTimeout(() => show = true, 350 + {{ $index }} * 30)" x-show="show"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $internship->company }}</td>
                                    <td class="px-6 py-4">{{ $internship->role }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2.5 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">
                                            {{ $internship->category }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 {{ $internship->deadline < now() ? 'text-red-500 font-medium' : '' }}">
                                        {{ \Carbon\Carbon::parse($internship->deadline)->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2.5 py-1 text-xs font-medium {{ $internship->status === 'live' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full">
                                            {{ ucfirst($internship->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2 flex justify-end">
                                        <a href="{{ route('admin.internships.edit', $internship) }}"
                                            class="text-brand-600 hover:text-brand-900 font-medium px-2 py-1 rounded hover:bg-brand-50 transition">Edit</a>
                                        <form action="{{ route('admin.internships.destroy', $internship) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this specific internship posting?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 font-medium px-2 py-1 rounded hover:bg-red-50 transition">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        No live internships found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $internships->links() }}
            </div>

        </div>
    </div>
</x-app-layout>