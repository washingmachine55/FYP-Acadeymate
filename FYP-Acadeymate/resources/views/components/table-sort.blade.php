@php
isActive = false;
ascending = true;
descending = false;
@endphp

<span @class(['p-4', 'font-bold' => true])>
	{{ $slot }}
</span>
