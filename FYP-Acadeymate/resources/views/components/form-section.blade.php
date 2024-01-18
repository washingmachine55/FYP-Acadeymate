@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            {{-- <div class="px-4 py-5 bg-white dark:bg-gray-700 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl- sm:rounded-tr-md' : 'sm:rounded-md' }}"> --}}
            <div class="px-4 py-5 bg-white dark:bg-gray-700 sm:p-6 shadow {{ isset($actions) ? 'rounded-lg' : 'sm:rounded-lg' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>

            @if (isset($actions))
                {{-- <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"> --}}
                <div class="flex items-center justify-end px-1 py-1 text-end mt-2 sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
            </div>
        </form>
    </div>
</div>
