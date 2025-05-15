@props([
    'content' => '',
    'position' => 'top',
    'trigger' => 'hover'
])

@php
$positions = [
    'top' => [
        'tooltip' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'arrow' => 'top-full left-1/2 -translate-x-1/2 -mt-[2px] border-t-gray-900 dark:border-t-gray-700 border-x-transparent border-b-transparent'
    ],
    'bottom' => [
        'tooltip' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'arrow' => 'bottom-full left-1/2 -translate-x-1/2 -mb-[2px] border-b-gray-900 dark:border-b-gray-700 border-x-transparent border-t-transparent'
    ],
    'left' => [
        'tooltip' => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'arrow' => 'left-full top-1/2 -translate-y-1/2 -ml-[2px] border-l-gray-900 dark:border-l-gray-700 border-y-transparent border-r-transparent'
    ],
    'right' => [
        'tooltip' => 'left-full top-1/2 -translate-y-1/2 ml-2',
        'arrow' => 'right-full top-1/2 -translate-y-1/2 -mr-[2px] border-r-gray-900 dark:border-r-gray-700 border-y-transparent border-l-transparent'
    ]
];
@endphp

<div 
    x-data="{ show: false }"
    @if($trigger === 'hover')
        @mouseenter="show = true"
        @mouseleave="show = false"
    @elseif($trigger === 'click')
        @click="show = !show"
        @click.away="show = false"
    @endif
    class="relative inline-block"
>
    <div class="inline-block">
        {{ $slot }}
    </div>

    <template x-if="show">
        <div class="absolute z-50 {{ $positions[$position]['tooltip'] }}">
            <div 
                class="relative bg-gray-900 dark:bg-gray-700 text-white text-sm rounded py-1 px-2 whitespace-nowrap"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
            >
                {{ $content }}
                <div class="absolute w-0 h-0 border-4 {{ $positions[$position]['arrow'] }}"></div>
            </div>
        </div>
    </template>
</div> 