<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        A temporary test page for components and other user actions
    </h1>

	{{-- <div x-init="{ search : '' )"></div> --}}

	<div class="flex mt-10">
		<div class="flex-row">
			<h2 class="text-3xl dark:text-white mb-3">Other actions</h2>
			<x-button wire:navigate href="{{ route('create-educational-institute') }}" >Create Educational Institutes</x-button>
			<x-button wire:navigate href="{{ route('livewire.view-educational-institutes') }}" >View Educational Institutes</x-button>
			<x-button wire:navigate href="{{ route('livewire.view-educational-institutes') }}" >View Single Educational Institute</x-button>
			<x-danger-button >View Profiles</x-danger-button>
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
			<x-danger-button >View Guardians</x-danger-button>
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
			<h2 class="text-3xl dark:text-white mb-3">Delect LMS actions</h2>
			<x-danger-button >Delete Subjects</x-danger-button>
			<x-danger-button >Delete Batches</x-danger-button>
			<x-danger-button >Delete Courses</x-danger-button>
			<x-danger-button >Delete Modules</x-danger-button>
			<x-danger-button >Delete Classes</x-danger-button>
			<x-danger-button >Delete Class Sections</x-danger-button>
		</div>
	</div>

</div>

			{{-- <x-button wire:navigate href="{{ route('livewire.create-users') }}" wire:click="$set('search', 'Developer/Super Admin')">Create Developer Admins</x-button> --}}
			{{-- <x-button wire:navigate href="{{ route('livewire.view-users') }}" wire:click="$set('search', 'All Users')">View All Users</x-button> --}}
