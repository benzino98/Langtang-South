<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Upload Gallery Images</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.gallery-images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-select name="gallery_album_id" label="Album" :options="$albums->pluck('title', 'id')" required />

            <div>
                <label for="images" class="block text-sm font-medium text-gray-700">Images (multiple allowed)</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="images[]" id="images" class="w-full" multiple required>
                </div>
                @error('images')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-input name="caption" label="Caption (applies to all images)" />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.gallery-images.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Upload Images
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
