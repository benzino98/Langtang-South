<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Project</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-input name="title" label="Project Title" required />

            <x-form-input name="community_ward" label="Community / Ward" required />

            <x-form-select name="status" label="Status" :options="['planned' => 'Planned', 'ongoing' => 'Ongoing', 'completed' => 'Completed']" required />

            <x-form-textarea name="description" label="Description" rows="8" required />

            <x-form-input name="completion_date" type="date" label="Completion Date" />

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="featured_image" id="featured_image" class="w-full">
                </div>
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.projects.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Project
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
