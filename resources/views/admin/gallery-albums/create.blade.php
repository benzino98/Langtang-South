<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Album</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.gallery-albums.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-input name="title" label="Album Title" required />

            <x-form-textarea name="description" label="Description" rows="4" />

            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="cover_image" id="cover_image" class="w-full">
                </div>
                @error('cover_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.gallery-albums.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Album
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
