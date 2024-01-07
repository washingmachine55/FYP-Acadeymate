<x-app-layout>
	<div class="flex">
		<div class="flex-col m-9" name="image">
			{{-- <img src="{{ asset('images/educational-institute.png') }}" alt="Educational Institute" class="w-1/2 h-1/2" /> --}}
			<img src="{{ 'https://ui-avatars.com/api/?name=A+B&color=7F9CF5&background=EBF4FF' }}" alt="Random Image"
			class="w-72 rounded-2xl border border-gray-400" />
		</div>
		<div class="flex-col w-full" name="details">
			<h1 class="text-7xl mt-9 dark:text-white text-black text-opacity-80 font-bold" >{{ $educationalInstitute->name }}</h1>
			<h2 class="text-2xl mt-3 dark:text-white text-black text-opacity-80">Main contact email: <a class="italic hover:underline duration-500" href="">{{ $educationalInstitute->email }}</a></h2>
		</div>

		@can('edit-courses')
		<div>
			<x-edit-button class="m-9">Edit</x-edit-button>
		</div>
		@endcan

	</div>
</x-app-layout>
