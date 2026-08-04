<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Department</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.departments.update', $department) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="name" label="Department Name" :value="old('name', $department->name)" required />

            <x-form-textarea name="description" label="Description" rows="8" :value="old('description', $department->description)" required />

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="featured_image" id="featured_image" class="w-full">
                </div>
                @if ($department->featured_image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $department->featured_image) }}" alt="{{ $department->name }}" class="w-48 h-auto rounded-lg">
                    </div>
                @endif
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Department
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.departments.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Department
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
