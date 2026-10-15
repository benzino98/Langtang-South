@props(['title', 'value', 'icon'])

<div class="bg-white rounded-xl shadow-sm p-6 flex items-start justify-between">
    <div>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ $title }}</p>
        <p class="text-3xl font-bold text-gray-900">{{ $value }}</p>
    </div>
    <div class="flex-shrink-0">
        <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-primary-green/10 text-primary-green">
            <x-icon :name="$icon" class="h-6 w-6"/>
        </span>
    </div>
</div>
