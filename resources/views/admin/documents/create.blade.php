<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Upload Document</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-select name="document_category_id" label="Category" :options="$categories->pluck('name', 'id')" required />

            <x-form-input name="title" label="Document Title" required />

            <x-form-textarea name="description" label="Description" rows="4" />

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File (PDF, DOC, XLS, PPT, Image)</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="file" id="file" class="w-full" required>
                </div>
                @error('file')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.documents.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Upload Document
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
