<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-heading text-xl font-bold text-gray-900">Gallery Images</h1>
            <a href="{{ route('admin.gallery-images.create') }}" class="btn-primary">
                Upload Images
            </a>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Album
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Caption
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($images as $image)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? 'Gallery image' }}" class="w-16 h-12 rounded object-cover">
                            </th>
                            <td class="px-6 py-4">
                                {{ $image->album->title ?? '—' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $image->caption ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.gallery-images.edit', $image) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No gallery images found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $images->links() }}
        </div>
    </div>
</x-admin-layout>
