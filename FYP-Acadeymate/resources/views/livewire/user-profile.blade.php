<x-app-layout>
	<div class="flex">
		@if ( $user->profile_photo_path != NULL )
		<div class="flex-col m-9" name="image">
			{{-- <img src="{{ asset('images/educational-institute.png') }}" alt="Educational Institute" class="w-1/2 h-1/2" /> --}}
			<img src="{{ $user->profile_photo_url }}" alt="Random Image"
			class="w-72 rounded-2xl border border-gray-400" />
		</div>
		<div class="flex-col w-full" name="details">
		@else
		<div class="flex-col w-full ml-9" name="details">

		@endif
			<h1 class="text-7xl mt-9 dark:text-white text-black text-opacity-80 font-bold" >{{ $user->name }}</h1>
			<h2 class="text-2xl mt-3 dark:text-white text-black text-opacity-80">Currently a {{ $user->user_role }}</h2>
			<h2 class="text-2xl mt-3 dark:text-white text-black text-opacity-80">Main contact email: <a class="italic hover:underline duration-500" href="">{{ $user->email }}</a></h2>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80">Profile last updated: {{ $user->updated_at->format('D, d M Y @ h:m A') }}
			({{ Carbon\Carbon::parse($user->updated_at)->subDays()->diffForHumans()  }})</h3>
		</div>

		{{-- @can('edit-courses') --}}
		<div>
			<x-edit-button class="m-9">Edit</x-edit-button>
		</div>
		{{-- @endcan --}}

	</div>
</x-app-layout>
