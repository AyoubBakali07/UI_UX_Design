@props([
    'tabs' => [],
    'selected' => null,
    'variant' => 'default'
])

@php
$variants = [
    'default' => [
        'tab' => 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
        'selected' => 'border-blue-500 text-blue-600',
        'disabled' => 'text-gray-400 cursor-not-allowed'
    ],
    'pills' => [
        'tab' => 'text-gray-500 hover:text-gray-700 rounded-md',
        'selected' => 'bg-blue-100 text-blue-700 rounded-md',
        'disabled' => 'text-gray-400 cursor-not-allowed'
    ],
    'underline' => [
        'tab' => 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
        'selected' => 'border-blue-500 text-blue-600',
        'disabled' => 'text-gray-400 cursor-not-allowed'
    ]
];
@endphp

<div x-data="{ selected: '{{ $selected ?? array_key_first($tabs) }}' }">
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            @foreach($tabs as $key => $tab)
                <button
                    type="button"
                    @click="selected = '{{ $key }}'"
                    :class="[
                        selected === '{{ $key }}'
                            ? '{{ $variants[$variant]['selected'] }}'
                            : '{{ $variants[$variant]['tab'] }}',
                        'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none',
                        @if($tab['disabled'] ?? false)
                            '{{ $variants[$variant]['disabled'] }}'
                        @endif
                    ]"
                    :aria-selected="selected === '{{ $key }}'"
                    :tabindex="selected === '{{ $key }}' ? 0 : -1"
                    role="tab"
                    @if($tab['disabled'] ?? false)
                        disabled
                    @endif
                >
                    <div class="flex items-center">
                        @if(isset($tab['icon']))
                            <span class="mr-2">
                                {!! $tab['icon'] !!}
                            </span>
                        @endif
                        {{ $tab['label'] }}
                        @if(isset($tab['badge']))
                            <span class="ml-2 px-2 py-0.5 text-xs font-medium rounded-full {{ isset($tab['badge']['class']) ? $tab['badge']['class'] : 'bg-blue-100 text-blue-700' }}">
                                {{ $tab['badge']['text'] }}
                            </span>
                        @endif
                    </div>
                </button>
            @endforeach
        </nav>
    </div>

    <div class="mt-4">
        @foreach($tabs as $key => $tab)
            <div
                x-show="selected === '{{ $key }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                role="tabpanel"
                tabindex="0"
            >
                {{ $tab['content'] }}
            </div>
        @endforeach
    </div>
</div> 