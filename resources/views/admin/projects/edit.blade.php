<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Project</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="title" label="Project Title" :value="old('title', $project->title)" required />

            <x-form-input name="community_ward" label="Community / Ward" :value="old('community_ward', $project->community_ward)" required />

            <x-form-select name="status" label="Status" :options="['planned' => 'Planned', 'ongoing' => 'Ongoing', 'completed' => 'Completed']" :selected="old('status', $project->status)" required />

            <x-form-textarea name="description" label="Description" rows="8" :value="old('description', $project->description)" required />

            <x-form-input name="completion_date" type="date" label="Completion Date" :value="old('completion_date', optional($project->completion_date)->format('Y-m-d'))" />

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="featured_image" id="featured_image" class="w-full">
                </div>
                @if ($project->featured_image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-48 h-auto rounded-lg">
                    </div>
                @endif
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" :checked="old('is_published', $project->is_published)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Project
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.projects.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Project
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
