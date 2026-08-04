<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-heading text-xl font-bold text-gray-900">Public Notices</h1>
            <a href="{{ route('admin.public-notices.create') }}" class="btn-primary">
                Add Notice
            </a>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Attachment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Published
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
                    @forelse ($notices as $notice)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $notice->title }}
                            </th>
                            <td class="px-6 py-4">
                                @if ($notice->attachment_path)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Attached
                                    </span>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $notice->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $notice->is_published ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $notice->updated_at->format('d M, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.public-notices.edit', $notice) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No public notices found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $notices->links() }}
        </div>
    </div>
</x-admin-layout>
