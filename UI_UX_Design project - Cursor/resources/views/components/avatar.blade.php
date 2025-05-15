@props([
    'size' => 'md',
    'src' => null,
    'alt' => '',
    'text' => '',
    'status' => null,
    'variant' => 'circle'
])

@php
$sizes = [
    'xs' => [
        'avatar' => 'h-6 w-6',
        'text' => 'text-xs',
        'status' => 'h-1.5 w-1.5',
        'status-offset' => '-right-0.5 -top-0.5'
    ],
    'sm' => [
        'avatar' => 'h-8 w-8',
        'text' => 'text-sm',
        'status' => 'h-2 w-2',
        'status-offset' => '-right-1 -top-1'
    ],
    'md' => [
        'avatar' => 'h-10 w-10',
        'text' => 'text-base',
        'status' => 'h-2.5 w-2.5',
        'status-offset' => '-right-1 -top-1'
    ],
    'lg' => [
        'avatar' => 'h-12 w-12',
        'text' => 'text-lg',
        'status' => 'h-3 w-3',
        'status-offset' => '-right-1 -top-1'
    ],
    'xl' => [
        'avatar' => 'h-14 w-14',
        'text' => 'text-xl',
        'status' => 'h-3.5 w-3.5',
        'status-offset' => '-right-1 -top-1'
    ]
];

$statuses = [
    'online' => 'bg-green-400',
    'offline' => 'bg-gray-400',
    'busy' => 'bg-red-400',
    'away' => 'bg-yellow-400'
];

$variants = [
    'circle' => 'rounded-full',
    'square' => 'rounded-lg'
];

$bgColors = [
    'gray' => 'bg-gray-500',
    'red' => 'bg-red-500',
    'yellow' => 'bg-yellow-500',
    'green' => 'bg-green-500',
    'blue' => 'bg-blue-500',
    'indigo' => 'bg-indigo-500',
    'purple' => 'bg-purple-500',
    'pink' => 'bg-pink-500'
];

$randomColor = array_rand($bgColors);
@endphp

<div class="relative inline-block">
    @if($src)
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            class="{{ $sizes[$size]['avatar'] }} {{ $variants[$variant] }} object-cover"
        >
    @else
        <div class="{{ $sizes[$size]['avatar'] }} {{ $variants[$variant] }} {{ $bgColors[$randomColor] }} flex items-center justify-center">
            <span class="font-medium text-white {{ $sizes[$size]['text'] }}">
                @if($text)
                    {{ substr($text, 0, 2) }}
                @else
                    {{ substr($alt, 0, 2) }}
                @endif
            </span>
        </div>
    @endif

    @if($status && isset($statuses[$status]))
        <span class="absolute {{ $sizes[$size]['status-offset'] }} block {{ $sizes[$size]['status'] }} {{ $variants['circle'] }} {{ $statuses[$status] }} ring-2 ring-white"></span>
    @endif
</div> 