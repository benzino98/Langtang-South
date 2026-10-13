<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Gallery Image</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.gallery-images.update', $galleryImage) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-select name="gallery_album_id" label="Album" :options="$albums->pluck('title', 'id')" :selected="old('gallery_album_id', $galleryImage->gallery_album_id)" required />

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Replace Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="image" id="image" class="w-full">
                </div>
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $galleryImage->image_path) }}" alt="{{ $galleryImage->caption ?? 'Gallery image' }}" class="w-48 h-auto rounded-lg">
                </div>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-input name="caption" label="Caption" :value="old('caption', $galleryImage->caption)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Image
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.gallery-images.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Image
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.gallery-images.destroy', $galleryImage) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
