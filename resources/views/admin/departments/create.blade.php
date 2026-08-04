<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Department</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.departments.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-input name="name" label="Department Name" required />

            <x-form-textarea name="description" label="Description" rows="8" required />

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="featured_image" id="featured_image" class="w-full">
                </div>
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.departments.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Department
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
