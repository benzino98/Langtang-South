<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Notice</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.public-notices.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-input name="title" label="Notice Title" required />

            <x-form-textarea name="description" label="Description" rows="8" required />

            <div>
                <label for="attachment" class="block text-sm font-medium text-gray-700">Attachment (PDF, DOC, XLS, Image)</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="attachment" id="attachment" class="w-full">
                </div>
                @error('attachment')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.public-notices.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Notice
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
