<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-heading text-xl font-bold text-gray-900">Leadership</h1>
            <a href="{{ route('admin.leadership.create') }}" class="btn-primary">
                Add Member
            </a>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Last Updated
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leadership as $member)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('storage/' . $member->profile_image) }}" alt="{{ $member->name }}" class="w-10 h-10 rounded-full object-cover">
                                    <span>{{ $member->name }}</span>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $member->position }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $member->updated_at->format('d M, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.leadership.edit', $member) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No leadership members found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $leadership->links() }}
        </div>
    </div>
</x-admin-layout>
