<x-app-layout >
@section('title', "Create an Educational Institute - Acadeymate")
<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
	<div class="mb-5">
		<h1 class="text-3xl font-medium text-gray-900 dark:text-white">
			Create an Educational Institute</h1>
		</div>

		<x-validation-errors class="mb-4" />

		<form method="POST" action="{{ route('EducationalInstitute.store', ['id']) }}" >
			@csrf
			@method('POST')

			<div>
				<x-label for="name" value="{{ __('Name of Educational Institute') }}" />
				<x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
			</div>

			<div class="mt-4">
				<x-label for="email" value="{{ __('Main Contact Email') }}" />
				<x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"  autocomplete="username" />
			</div>

			{{-- @can('delete-educational-institutes')
			<div class="mt-4">
				<x-label for="email" value="{{ __('Main Contact Email') }}" />
				<x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"  autocomplete="username" />
			</div>
			@endcan --}}

			{{-- <div class="mt-4" >
				<x-label for="user_role" value="{{ __('Register As') }}" />
				<div align="left" class="block mt-1 w-full">
					<select name="user_role" class="block pt-2 pb-2 mt-1 w-full bg-white text-black border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white h-11 dark:hover:bg-indigo-600 focus:border-indigo-500 dark:focus:text-white dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition-all duration-500 hover:border-indigo-500'">
						<option name="user_role" value="" selected disabled>
							Select one
						</option>
						<option option="1" name="user_role" value="Educational Institute Admin" x-on:click="option_value = 'Educational Institute Administrator'" >
							Educational Institute Administrator
						</option>
						<option option="2" name="user_role" value="Lecturer" x-on:click="option_value = 'Lecturer'">
							Lecturer
						</option>
						<option option="3" name="user_role" value="Student" x-on:click="option_value = 'Student'">
							Student
						</option>
						<option option="4" name="user_role" value="Guardian" x-on:click="option_value = 'Guardian'">
							Guardian
						</option>
						<option option="5" name="user_role" value="Developer/Super Admin" x-on:click="option_value = 'Developer/Super Admin'" >
							Developer/Super Admin
						</option>
					</select>
				</div>
			</div> --}}

			<div class="flex items-center justify-end mt-6">
				<a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" >
					{{ __('Clear form?') }}
				</a>

				@can('delete-educational-institutes')
				<x-button class="ms-4">
					{{ __('Create and add another') }}
				</x-button>
				@endcan
				<x-button class="ms-4">
					{{ __('Create') }}
				</x-button>
			</div>
		</form>
	</div>
</x-app-layout >
