@props(['active' => false, 'icon' => ''])

@php
$classes = 'flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200';
if ($active) {
    $classes .= ' bg-primary-green/10 text-primary-green';
} else {
    $classes .= ' text-gray-700 hover:bg-green-50 hover:text-primary-green';
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <x-icon :name="$icon" class="w-5 h-5 mr-3" />
    @endif
    <span>{{ $slot }}</span>
</a>
