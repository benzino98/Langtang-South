<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Leadership Member</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.leadership.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-input name="name" label="Full Name" required />

            <x-form-input name="position" label="Position / Title" required />

            <x-form-textarea name="bio" label="Biography" rows="8" />

            <x-form-input name="display_order" type="number" label="Display Order" value="0" required />

            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="profile_image" id="profile_image" class="w-full" required>
                </div>
                @error('profile_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.leadership.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Member
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
