@props([
    'value' => 0,
    'max' => 100,
    'type' => 'default',
    'size' => 'md',
    'showLabel' => true,
    'animated' => false,
    'striped' => false
])

@php
$percentage = ($value / $max) * 100;

$types = [
    'default' => 'bg-blue-600',
    'success' => 'bg-green-600',
    'warning' => 'bg-yellow-600',
    'danger' => 'bg-red-600',
    'info' => 'bg-indigo-600',
    'purple' => 'bg-purple-600',
    'pink' => 'bg-pink-600'
];

$sizes = [
    'xs' => 'h-1',
    'sm' => 'h-2',
    'md' => 'h-4',
    'lg' => 'h-6'
];

$labelSizes = [
    'xs' => 'text-xs',
    'sm' => 'text-sm',
    'md' => 'text-sm',
    'lg' => 'text-base'
];

$baseClasses = 'rounded-full overflow-hidden bg-gray-200';
$progressClasses = $types[$type] . ' ' . $sizes[$size] . ' transition-all duration-300';

if ($striped) {
    $progressClasses .= ' bg-gradient-to-r from-transparent via-white/20 to-transparent bg-[length:20px_20px]';
}

if ($animated && $striped) {
    $progressClasses .= ' animate-[progress-bar-stripes_1s_linear_infinite]';
}
@endphp

<div {{ $attributes->merge(['class' => $baseClasses]) }}>
    <div
        role="progressbar"
        aria-valuenow="{{ $value }}"
        aria-valuemin="0"
        aria-valuemax="{{ $max }}"
        class="{{ $progressClasses }}"
        style="width: {{ $percentage }}%"
    >
        @if($showLabel && $size === 'lg')
            <div class="flex items-center justify-center h-full text-white {{ $labelSizes[$size] }}">
                {{ $percentage }}%
            </div>
        @endif
    </div>
</div>
@if($showLabel && $size !== 'lg')
    <div class="mt-1 flex justify-between items-center">
        <span class="text-sm text-gray-600">Progress</span>
        <span class="text-sm font-medium text-gray-900">{{ $percentage }}%</span>
    </div>
@endif

<style>
@keyframes progress-bar-stripes {
    from { background-position: 20px 0; }
    to { background-position: 0 0; }
}
</style> 