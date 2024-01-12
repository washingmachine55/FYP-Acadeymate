<x-app-layout>
@section('title', $educationalInstitute->name . " - Acadeymate")
	<div class="flex flex-row m-9 h-72" >
		<img src="{{ $educationalInstitute->cover_photo }}" alt="{{ __('') }}" class="object-cover rounded-2xl h-full w-full " />
		@can('edit-courses')
		<div class="absolute left-[86%] z-50 m-9">
			{{-- <x-edit-button class="m-9">Edit</x-edit-button> --}}
			@livewire('enroll-user-modal')
		</div>
		@endcan
	</div>

	<div class="flex flex-row -mt-40">
		<div class="flex-col m-9 mr-20 " name="image">
			<img src="{{ $educationalInstitute->logo }}" alt="Random Image" class="w-52 h-52 rounded-2xl border border-gray-400 ml-12 sticky top-0" />
		</div>
		<div class="flex-col w-[45%]" name="details">
			<h1 class="text-7xl mt-9 dark:text-white text-black text-opacity-80 font-bold sticky top-0 dark:bg-slate-700 bg-orange-200 bg-opacity-70 p-6 rounded-2xl" >{{ $educationalInstitute->name }}</h1>
			<h3 class="text-xl mt-6 dark:text-white text-black text-opacity-80 ml-1"><strong>Profile last updated:</strong> {{ $educationalInstitute->updated_at->format('D, d M Y @ h:m A') }} ({{ Carbon\Carbon::parse($educationalInstitute->updated_at)->subDays()->diffForHumans()  }})</h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1 leading-relaxed text-justify"><strong>Description:</strong> {{ $educationalInstitute->about }}</h3>
		</div>
		<div class=" shadow-lg rounded-2xl bg-orange-400 dark:bg-slate-700 w-[35%] mt-40 mr-9 ml-9 p-9 sticky top-6 bg-opacity-70 mb-20" name="details">
			<h2 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1"><strong>Main contact email:</strong> <a class="italic hover:underline duration-500" href="mailto:{{ $educationalInstitute->email }}">{{ $educationalInstitute->email }}</a></h2>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1"><strong>Contact Number:</strong> <a class="italic hover:underline duration-500" href="tel:{{ $educationalInstitute->phone }}">{{ $educationalInstitute->phone }}</a></h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1"><strong>Website:</strong> <a class="italic hover:underline duration-500" href="{{ $educationalInstitute->website }}">{{ $educationalInstitute->website }}</a></h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1"><strong>Address:</strong> {{ $educationalInstitute->address }}, {{ $educationalInstitute->city }}, {{ $educationalInstitute->country }}</h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1"><strong>Profile last updated:</strong> {{ $educationalInstitute->updated_at->format('D, d M Y @ h:m A') }} <br/> ({{ Carbon\Carbon::parse($educationalInstitute->updated_at)->subDays()->diffForHumans()  }})</h3>
		</div>
	</div>


	<div class="flex flex-row m-9 h-72" >
		<p>Courses offered</p>
		<br/>
		<p>Upcomming Batches</p>

		<p>Awards</p>
	</div>
</x-app-layout>
