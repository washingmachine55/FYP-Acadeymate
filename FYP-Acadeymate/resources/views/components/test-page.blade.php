<div class="p-6 lg:p-8 bg-orange-100 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-3xl font-normal text-gray-900 dark:text-white font-display">
        A temporary test page for components and other user actions
    </h1>

	{{-- <div x-init="{ search : '' )"></div> --}}


	<div class="flex mt-10">
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Other actions</h2>
			<x-button wire:navigate href="{{ route('create-educational-institute') }}" >Create Educational Institutes</x-button>
			<x-button wire:navigate href="{{ route('livewire.view-educational-institutes') }}" >View Educational Institutes</x-button>
			<x-button wire:navigate href="{{ route('livewire.view-educational-institutes') }}" >View Single Educational Institute</x-button>
			<x-button wire:navigate>  Assign Users to Instituitions</x-button>
			<x-button >View Profiles</x-button>
			<x-danger-button >Edit Profile Details</x-danger-button>
		</div>
	</div>
	<div class="flex mt-10">
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">View User(s) actions</h2>
			<x-button wire:navigate href="{{ route('livewire.view-users') }}" >View All Users</x-button>
			<x-danger-button >View Developer Admins</x-danger-button>
			<x-danger-button >View Educational Institute Admins</x-danger-button>
			<x-danger-button >View Lecturers</x-danger-button>
			<x-danger-button >View Students</x-danger-button>
			<x-secondary-button wire:navigate href="{{ route('view-guardians') }}" >View Guardians</x-secondary-button>
			<x-secondary-button wire:navigate href="{{ route('assign-guardians') }}" >Assign Guardians</x-secondary-button>
		</div>
	</div>
	<div class="flex mt-10">
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Create LMS actions</h2>
			<x-secondary-button wire:navigate href="{{ route('create-educational-institute') }}" >Create an Educational Institute</x-secondary-button>
			<x-danger-button >Create Subjects</x-danger-button>
			<x-danger-button >Create Batches</x-danger-button>
			<x-danger-button >Create Courses</x-danger-button>
			<x-danger-button >Create Modules</x-danger-button>
			<x-danger-button >Create Classes</x-danger-button>
			<x-danger-button >Create Class Sections</x-danger-button>
		</div>
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">View LMS actions</h2>
			<x-danger-button >View Subjects</x-danger-button>
			<x-danger-button >View Batches</x-danger-button>
			<x-danger-button >View Courses</x-danger-button>
			<x-danger-button >View Modules</x-danger-button>
			<x-danger-button >View Classes</x-danger-button>
			<x-danger-button >View Class Sections</x-danger-button>
		</div>
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Edit LMS actions</h2>
			<x-danger-button >Edit Subjects</x-danger-button>
			<x-danger-button >Edit Batches</x-danger-button>
			<x-danger-button >Edit Courses</x-danger-button>
			<x-danger-button >Edit Modules</x-danger-button>
			<x-danger-button >Edit Classes</x-danger-button>
			<x-danger-button >Edit Class Sections</x-danger-button>
		</div>
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Delete LMS actions</h2>
			<x-danger-button >Delete Subjects</x-danger-button>
			<x-danger-button >Delete Batches</x-danger-button>
			<x-danger-button >Delete Courses</x-danger-button>
			<x-danger-button >Delete Modules</x-danger-button>
			<x-danger-button >Delete Classes</x-danger-button>
			<x-danger-button >Delete Class Sections</x-danger-button>
		</div>
	</div>
	<div class="flex mt-10 space-x-10">
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Modal Test</h2>
			@livewire('enroll-user-modal')
		</div>
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Actions Expand</h2>

			<div class=" m-9 transform-cpu action-container">
				<div
					class="flex rounded-2xl justify-center items-center h-14 w-14 hover:-translate-x-20 bg-orange-400 bg-opacity-70 float-right right-0  hover:w-36 hover:h-36  transition-all duration-1000 ease-in-out"
					x-data="{ hidden: true }"
					x-init="hidden = true"
					@mouseenter="hidden = false"
					@mouseleave="hidden = true"
					>
						<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-center duration-75 transition-all" x-show="hidden">
							<path d="M3.49984 10.3334H16.7499C17.1359 12.2352 18.8174 13.6667 20.8332 13.6667C22.849 13.6667 24.5304 12.2352 24.9165 10.3334H28.4998C28.9601 10.3334 29.3332 9.96028 29.3332 9.50004C29.3332 9.0398 28.9601 8.66671 28.4998 8.66671H24.9165C24.5304 6.76484 22.849 5.33337 20.8332 5.33337C18.8174 5.33337 17.1359 6.76484 16.7499 8.66671H3.49984C3.0396 8.66671 2.6665 9.0398 2.6665 9.50004C2.6665 9.96028 3.0396 10.3334 3.49984 10.3334ZM3.49984 23H7.24985C7.63591 24.9019 9.31737 26.3334 11.3332 26.3334C13.349 26.3334 15.0304 24.9019 15.4165 23H28.4998C28.9601 23 29.3332 22.6269 29.3332 22.1667C29.3332 21.7065 28.9601 21.3334 28.4998 21.3334H15.4165C15.0304 19.4315 13.349 18 11.3332 18C9.31737 18 7.63591 19.4315 7.24985 21.3334H3.49984C3.0396 21.3334 2.6665 21.7065 2.6665 22.1667C2.6665 22.6269 3.0396 23 3.49984 23Z" fill="var(--svgcolor)"/>
						</svg>

					{{-- This works but needs to be designed better, and perhaps be replaced with an SVG icon --}}
						<div
							class="flex min-w-full min-h-full space-y-2 text-nowrap justify-center items-center flex-col"
							x-show="!hidden"
							x-transition:enter="transition duration-1000 ease"
							x-transition:enter-start="opacity-0"
							x-transition:enter-end="opacity-100"
							x-transition:leave="transition duration-150 ease-out"
							x-transition:leave-start="opacity-100"
							x-transition:leave-end="opacity-0"
							>
								<x-button>Enroll users</x-button>
								@livewire('enroll-user-modal')
								<x-button>Edit Profile</x-button>
						</div>
				</div>
			</div>

		</div>
	</div>


</div>

			{{-- <x-button wire:navigate href="{{ route('livewire.create-users') }}" wire:click="$set('search', 'Developer/Super Admin')">Create Developer Admins</x-button> --}}
			{{-- <x-button wire:navigate href="{{ route('livewire.view-users') }}" wire:click="$set('search', 'All Users')">View All Users</x-button> --}}
