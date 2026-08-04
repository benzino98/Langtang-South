<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Category</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.news-categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <x-form-input name="name" label="Category Name" required />

            <x-form-textarea name="description" label="Description" rows="4" />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.news-categories.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
