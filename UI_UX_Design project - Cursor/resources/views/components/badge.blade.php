@props([
    'type' => 'default',
    'size' => 'md',
    'rounded' => true
])

@php
$types = [
    'default' => 'bg-gray-100 text-gray-800',
    'primary' => 'bg-blue-100 text-blue-800',
    'success' => 'bg-green-100 text-green-800',
    'warning' => 'bg-yellow-100 text-yellow-800',
    'danger' => 'bg-red-100 text-red-800',
    'info' => 'bg-indigo-100 text-indigo-800',
    'purple' => 'bg-purple-100 text-purple-800',
    'pink' => 'bg-pink-100 text-pink-800'
];

$sizes = [
    'sm' => 'px-2 py-0.5 text-xs',
    'md' => 'px-2.5 py-0.5 text-sm',
    'lg' => 'px-3 py-0.5 text-base'
];

$radius = $rounded ? 'rounded-full' : 'rounded';

$classes = $types[$type] . ' ' . $sizes[$size] . ' ' . $radius . ' inline-flex items-center font-medium';
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span> 