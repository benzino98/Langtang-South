<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-heading text-xl font-bold text-gray-900">Gallery Albums</h1>
            <a href="{{ route('admin.gallery-albums.create') }}" class="btn-primary">
                Add Album
            </a>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Album
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Images
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
                    @forelse ($albums as $album)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    @if ($album->cover_image)
                                        <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" class="w-12 h-12 rounded-lg object-cover">
                                    @endif
                                    <span>{{ $album->title }}</span>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $album->images_count }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $album->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $album->is_published ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $album->updated_at->format('d M, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.gallery-albums.edit', $album) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No gallery albums found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $albums->links() }}
        </div>
    </div>
</x-admin-layout>
