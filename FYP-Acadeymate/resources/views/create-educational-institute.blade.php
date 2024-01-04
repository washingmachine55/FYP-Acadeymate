<x-app-layout>
	{{-- <x-slot name=title> Create Edu Institute</x-slot>
		<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
				{{ __('Dashboard') }}
			</h2>
		</x-slot> --}}

		<div class="flex">
			<x-validation-errors class="mb-4" />

			<form method="POST" action="{{ route('EducationalInstitute.store') }}" >
				@csrf
				@method('POST')

				<div>
					<x-label for="name" value="{{ __('Name of Educational Institute') }}" />
					<x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
				</div>

				<div class="mt-4">
					<x-label for="email" value="{{ __('Main Email') }}" />
					<x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"  autocomplete="email" />
				</div>

				<div class="flex items-center justify-end mt-4">
					<x-button class="ms-4" type="submit">
						{{ __('Create') }}
					</x-button>
				</div>
			</form>
		</div>

	</x-app-layout>
