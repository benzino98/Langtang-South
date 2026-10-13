<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Album</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.gallery-albums.update', $galleryAlbum) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="title" label="Album Title" :value="old('title', $galleryAlbum->title)" required />

            <x-form-textarea name="description" label="Description" rows="4" :value="old('description', $galleryAlbum->description)" />

            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="cover_image" id="cover_image" class="w-full">
                </div>
                @if ($galleryAlbum->cover_image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $galleryAlbum->cover_image) }}" alt="{{ $galleryAlbum->title }}" class="w-48 h-auto rounded-lg">
                    </div>
                @endif
                @error('cover_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" :checked="old('is_published', $galleryAlbum->is_published)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Album
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.gallery-albums.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Album
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.gallery-albums.destroy', $galleryAlbum) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
