<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Users') }}
        </h2>
    </x-slot>

	<div class="flex">

        <x-sidebar class="flex-col col-2"></x-sidebar>

        <div class="mt-6 pl-28">
            <div class="mx-auto  sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg"
                    style="border-radius: 1.5625rem; box-shadow: 2px 0px 4px 1px rgba(0, 0, 0, 0.25);">
					<livewire:view-users>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
