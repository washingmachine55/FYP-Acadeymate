@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-orange-500 dark:focus:border-orange-600 hover:border-orange-500 hover:ring-orange-500 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm transition-all duration-500']) !!}>
