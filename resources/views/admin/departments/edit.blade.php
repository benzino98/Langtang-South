<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Department</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.departments.update', $department) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="name" label="Department Name" :value="old('name', $department->name)" required />

            <x-form-textarea name="overview" label="Overview" rows="8" :value="old('overview', $department->overview)" required />

            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="image_path" id="image_path" class="w-full">
                </div>
                @if ($department->image_path)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $department->image_path) }}" alt="{{ $department->name }}" class="w-48 h-auto rounded-lg">
                    </div>
                @endif
                @error('image_path')
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
