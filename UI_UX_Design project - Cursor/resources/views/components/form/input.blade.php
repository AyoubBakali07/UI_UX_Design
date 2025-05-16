@props([
    'disabled' => false,
    'error' => false,
    'type' => 'text',
    'label' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'helper' => ''
])

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative rounded-md shadow-sm">
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @if($disabled) disabled @endif
            @if($required) required @endif
            {{ $attributes->merge([
                'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm' . 
                          ($error ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : '') .
                          ($disabled ? ' bg-gray-50 text-gray-500' : '')
            ]) }}
        />

        @if($error)
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
    </div>

    @if($helper)
        <p class="mt-2 text-sm text-gray-500">{{ $helper }}</p>
    @endif

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div> 