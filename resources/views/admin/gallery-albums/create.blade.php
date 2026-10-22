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
                <label class="block text-sm font-medium text-gray-700">Select Images</label>
                <p class="mt-1 text-xs text-gray-500">Click on images to select them for this album.</p>
                <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 max-h-96 overflow-y-auto p-1" id="image-grid">
                    @foreach ($images as $image)
                        <div class="relative cursor-pointer rounded-lg overflow-hidden border-2 border-gray-200 hover:border-primary-green-light transition-all duration-200 image-card" data-image-card data-image-id="{{ $image->id }}">
                            <input type="checkbox" name="image_ids[]" value="{{ $image->id }}" class="hidden input-image-checkbox">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? '' }}" class="w-full h-24 object-cover">
                            <div class="absolute inset-0 bg-primary-green/30 opacity-0 transition-opacity duration-200 selected-overlay flex items-center justify-center">
                                <svg class="w-8 h-8 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('image_ids')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('image_ids.*')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div class="mt-3 flex items-center justify-between">
                    <span id="selection-counter" class="text-sm font-medium text-gray-600">0 images selected</span>
                    <button type="button" id="clear-selection" class="text-sm text-primary-green hover:underline font-medium">Clear all</button>
                </div>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageGrid = document.getElementById('image-grid');
    const selectionCounter = document.getElementById('selection-counter');
    const clearSelectionBtn = document.getElementById('clear-selection');

    function updateSelectionCounter() {
        const checkedCount = document.querySelectorAll('.input-image-checkbox:checked').length;
        selectionCounter.textContent = checkedCount + ' image' + (checkedCount !== 1 ? 's' : '') + ' selected';
    }

    function toggleCard(card) {
        const checkbox = card.querySelector('.input-image-checkbox');
        if (!checkbox) return;

        checkbox.checked = !checkbox.checked;

        const overlay = card.querySelector('.selected-overlay');
        if (checkbox.checked) {
            card.classList.remove('border-gray-200');
            card.classList.add('border-primary-green', 'ring-2', 'ring-primary-green/30');
            if (overlay) overlay.classList.remove('opacity-0');
        } else {
            card.classList.add('border-gray-200');
            card.classList.remove('border-primary-green', 'ring-2', 'ring-primary-green/30');
            if (overlay) overlay.classList.add('opacity-0');
        }

        updateSelectionCounter();
    }

    // Handle click on each image card
    imageGrid.addEventListener('click', function(e) {
        var card = e.target.closest('[data-image-card]');
        if (card) {
            e.preventDefault();
            toggleCard(card);
        }
    });

    // Clear selection button
    clearSelectionBtn.addEventListener('click', function() {
        document.querySelectorAll('.input-image-checkbox').forEach(function(checkbox) {
            checkbox.checked = false;
            var card = checkbox.closest('[data-image-card]');
            if (card) {
                card.classList.add('border-gray-200');
                card.classList.remove('border-primary-green', 'ring-2', 'ring-primary-green/30');
                var overlay = card.querySelector('.selected-overlay');
                if (overlay) overlay.classList.add('opacity-0');
            }
        });
        updateSelectionCounter();
    });

    updateSelectionCounter();
});
</script>
@endpush
