@props([
    'type' => 'info',
    'dismissible' => false,
    'title' => null
])

@php
$types = [
    'info' => [
        'bg' => 'bg-blue-50',
        'text' => 'text-blue-700',
        'border' => 'border-blue-200',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'iconColor' => 'text-blue-400'
    ],
    'success' => [
        'bg' => 'bg-green-50',
        'text' => 'text-green-700',
        'border' => 'border-green-200',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'iconColor' => 'text-green-400'
    ],
    'warning' => [
        'bg' => 'bg-yellow-50',
        'text' => 'text-yellow-700',
        'border' => 'border-yellow-200',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
        'iconColor' => 'text-yellow-400'
    ],
    'error' => [
        'bg' => 'bg-red-50',
        'text' => 'text-red-700',
        'border' => 'border-red-200',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'iconColor' => 'text-red-400'
    ]
];
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="rounded-md p-4 {{ $types[$type]['bg'] }} {{ $types[$type]['border'] }} border"
    role="alert"
>
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 {{ $types[$type]['iconColor'] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {!! $types[$type]['icon'] !!}
            </svg>
        </div>
        <div class="ml-3 flex-1">
            @if($title)
                <h3 class="text-sm font-medium {{ $types[$type]['text'] }}">
                    {{ $title }}
                </h3>
            @endif
            <div class="text-sm {{ $types[$type]['text'] }} @if($title) mt-2 @endif">
                {{ $slot }}
            </div>
        </div>
        @if($dismissible)
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button
                        type="button"
                        @click="show = false"
                        class="inline-flex rounded-md p-1.5 {{ $types[$type]['bg'] }} {{ $types[$type]['text'] }} hover:{{ $types[$type]['bg'] }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-{{ $types[$type]['bg'] }} focus:ring-{{ substr($types[$type]['text'], 5) }}"
                    >
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div> 