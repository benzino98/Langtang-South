{{--
    Button Component

    A reusable button component with multiple variants.

    @props
        - variant (string): 'primary' | 'secondary' | 'outline' | 'danger'. Default: 'primary'.
        - size (string): 'sm' | 'md' | 'lg'. Default: 'md'.
        - href (string, optional): If provided, renders an <a> tag instead of <button>.
        - type (string): The button type attribute. Default: 'button'.
--}}
@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => '',
    'type' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';

    $variants = [
        'primary'   => 'bg-primary-green text-white hover:bg-green-800 focus:ring-primary-green',
        'secondary' => 'bg-gold-accent text-white hover:bg-yellow-600 focus:ring-gold-accent',
        'outline'   => 'bg-transparent border-2 border-primary-green text-primary-green hover:bg-primary-green hover:text-white focus:ring-primary-green',
        'danger'    => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-7 py-3 text-base',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
