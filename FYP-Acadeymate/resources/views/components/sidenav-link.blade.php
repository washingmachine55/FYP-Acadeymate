@props([
	'active',
	'span',
])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center border-2 rounded-2xl p-2 border-orange-400 dark:border-orange-600 bg-orange-400 dark:bg-opacity-30 font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-orange-700 transition duration-50 ease-in-out font-display'
            : 'inline-flex items-center border-2 rounded-2xl p-2 border-transparent font-light leading-5 hover:bg-orange-200 dark:hover:bg-opacity-30 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-orange-300 dark:hover:border-orange-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-50 ease-in-out font-display active:bg-orange-400 active:bg-opacity-90 dark:active:bg-orange-400 dark:active:bg-opacity-20';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
	<div class="flex justify-content-around align-items-center" >
		{{ $slot }}
	</div>
</a>
