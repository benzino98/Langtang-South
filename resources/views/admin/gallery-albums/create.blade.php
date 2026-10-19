<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Album</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.gallery-albums.store') }}" method="POST" enctype="multipart/form-data" id="create-album-form" class="space-y-6">
            @csrf

            <x-form-input name="title" label="Album Title" required />

            <x-form-textarea name="description" label="Description" rows="4" />

            <div>
                <label for="images" class="block text-sm font-medium text-gray-700">Select Images</label>
                <p class="mt-1 text-xs text-gray-500">Choose multiple images from the gallery to add to this album.</p>
                <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 max-h-80 overflow-y-auto">
                    @foreach ($images as $image)
                        <label class="relative cursor-pointer group">
                            <input type="checkbox" name="image_ids[]" value="{{ $image->id }}" class="sr-only peer">
                            <div class="rounded-lg overflow-hidden border border-gray-200 group-hover:border-primary-green transition-colors duration-200">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="" class="h-24 w-full object-cover opacity-60 group-checked:opacity-100 transition-all duration-200 peer-checked:ring-2 peer-checked:ring-primary-green peer-checked:border-primary-green-dark">
                            </div>
                            <span class="absolute bottom-0 left-0 right-0 bg-black/60 text-white text-xs px-1 py-0.5 opacity-0 group-hover:opacity-100 transition-opacity duration-200 peer-checked:opacity-100">+ Add</span>
                        </label>
                    @endforeach
                </div>
                @error('image_ids.*')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" />

            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.gallery-albums.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create Album
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
