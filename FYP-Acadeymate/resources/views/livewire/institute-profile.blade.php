<div>
@section('title', $educationalInstitute->name . " - Acadeymate")
	<div class="flex flex-row m-9 h-72" >
		@if ($educationalInstitute->cover_photo == null)
			<div class="object-cover rounded-2xl h-full w-full border-2 border-red-400">
			</div>
		@else
			<img src="{{ $educationalInstitute->cover_photo }}" alt="{{ __('') }}" class="object-cover rounded-2xl h-full w-full " />
		@endif
		@can('edit-courses')
		<div class="absolute left-[90%] z-20 m-9 transform-cpu action-container">
			<div
				class="flex rounded-2xl justify-center items-center h-14 w-14 hover:-translate-x-20 bg-orange-400 bg-opacity-70
				hover:bg-opacity-100 float-right right-0  hover:w-36 hover:h-36  transition-all duration-1000 ease-in-out"
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
							<x-button wire:click="openTestModal" wire:loading.attr="disabled">
                {{ __('Enroll users') }}
            </x-button>
							<x-button>Edit Profile</x-button>
					</div>
			</div>
		</div>

		@endcan
	</div>

	<div class="flex flex-row -mt-40">
		<div class="flex-col m-9 mr-20 " name="image">
			@if ($educationalInstitute->cover_photo == null)
				<div class="w-52 h-52 rounded-2xl border border-red-400 ml-12 sticky top-0">
				</div>
			@else
				<img src="{{ $educationalInstitute->logo }}" alt="Random Image" class="w-52 h-52 rounded-2xl border border-gray-400 ml-12 sticky top-0" />
			@endif
		</div>
		<div class="flex-col w-[45%]" name="details">
			<h1 class="text-7xl mt-9 dark:text-white text-black text-opacity-80 font-semibold sticky top-0 dark:bg-slate-700 bg-orange-200 bg-opacity-70 p-6 rounded-2xl font-display" >{{ $educationalInstitute->name }}</h1>
			<h3 class="text-xl mt-6 dark:text-white text-black text-opacity-80 ml-1"><strong>Profile last updated:</strong> {{ $educationalInstitute->updated_at->format('D, d M Y @ h:m A') }} ({{ Carbon\Carbon::parse($educationalInstitute->updated_at)->subDays()->diffForHumans()  }})</h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1 leading-relaxed text-justify"><strong>Description:</strong> {{ $educationalInstitute->about }}</h3>
		</div>
		<div class=" shadow-lg rounded-2xl bg-orange-400 dark:bg-slate-700 w-[35%] mt-40 mr-9 ml-9 p-9 sticky top-6 bg-opacity-70 mb-20" name="details">
			<h2 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1">
				<strong>Main contact email:</strong> <a
					class="italic" href="mailto:{{ $educationalInstitute->email }}">{{ $educationalInstitute->email }}</a>
			</h2>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1">
				<strong>Contact Number:</strong> <a
					class="italic" href="tel:{{ $educationalInstitute->phone }}">{{ $educationalInstitute->phone }}</a>
			</h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1">
				<strong>Website:</strong> <a
					class="italic text-wrap" href="{{ $educationalInstitute->website }}">{{ $educationalInstitute->website }}</a>
			</h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1">
				<strong>Address:</strong> {{ $educationalInstitute->address }}, {{ $educationalInstitute->city }}, {{ $educationalInstitute->country }}
			</h3>
			<h3 class="text-xl mt-3 dark:text-white text-black text-opacity-80 ml-1">
				<strong>Profile last updated:</strong> {{ $educationalInstitute->updated_at->format('D, d M Y @ h:m A') }} <br/> ({{ Carbon\Carbon::parse($educationalInstitute->updated_at)->subDays()->diffForHumans()  }})
			</h3>
		</div>
	</div>


	<div class="flex flex-row m-9 h-72 space-x-6" >
		<div class="flex-col">
			<div class="flex-row mb-2">
				<h3 class="font-display text-3xl text-black dark:text-white font-medium">Courses Offered</h3>
			</div>
			<div class="flex-row mt-2 text-black dark:text-white">
				<ul>
					<li> BS 1</li>
					<li> BS 2</li>
					<li> BS 3</li>
				</ul>
			</div>
			<div class="flex-row mt-2 text-black dark:text-white">
				<x-secondary-button>View Past Batches</x-secondary-button>
			</div>
		</div>
		<div class="flex-col">
			<div class="flex-row mb-2">
				<h3 class="font-display text-3xl text-black dark:text-white font-medium">Upcoming Batches</h3>
			</div>
			<div class="flex-row mt-2 text-black dark:text-white">
				<ul>
					<li> BS 1</li>
					<li> BS 2</li>
					<li> BS 3</li>
				</ul>
			</div>
			<div class="flex-row mt-2 text-black dark:text-white">
				<x-secondary-button>View Past Batches</x-secondary-button>
			</div>
		</div>
		<div class="flex-col">
			<div class="flex-row mb-2">
				<h3 class="font-display text-3xl text-black dark:text-white font-medium">Awards</h3>
			</div>
			<div class="flex-row mt-2 text-black dark:text-white">
				<ul>
					<li> BS 1</li>
					<li> BS 2</li>
					<li> BS 3</li>
				</ul>
			</div>
			<div class="flex-row mt-2 text-black dark:text-white">
				<x-secondary-button>View Past Batches</x-secondary-button>
			</div>
		</div>
	</div>

	<x-dialog-modal-custom wire:model.live="showModal" class="{{ $showModal ? 'block' : 'hidden' }} " style="overflow-y: scroll !important;">
            <x-slot name="title">
                {{ __('Enroll users to selected institute') }}
            </x-slot>

            <x-slot name="content">
                {{ __("Please search and add users that you would like to add to this institute.") }}
				<br/>
				<italic>{{ __("When there's at least 1 user in the search result, press enter to select the user ") }}</italic>

                <div class="mt-4" x-data="{}" x-on:enrolling-users-to-institutes.window="setTimeout(() => $refs.enrollingUsers.focus(), 250)">
				<div class="flex flex-row justify-around space-x-3">
					<x-input type="text" class="mt-1 block w-3/4 float-start fill-available"
					wire:model.live.debounce.150ms="searchQuery"
					x-ref="enrollingUsers"
					placeholder="{{ __('Enter User\'s Name or Email here') }}"
					wire:keydown.enter="selectSearchedUser"
					/> <x-button class="mt-1 min-w-max block float-end" wire:click='clearSearchBox'>Clear Results</x-button>
					</div>


					<div class="flex w-full text-center place-content-evenly text-nowrap">
						<div class="mt-2 flex-col w-1/2 border-r">
							<h2 class="text-lg dark:text-white text-black">Search Results</h2>
							<div class="flex items-center flex-wrap">
								@foreach($users as $user)
								<x-secondary-button
									wire:click='selectClickedUser({{ $user["id"] }})'
									class="rounded-3xl m-1 self-center p-1 border-1 border-slate-500 dark:border-orange-100 duration-300 transition-all hover:ring-1 hover:bg-green-300 dark:hover:bg-green-700">{{ $user['name'] }} <br/> ({{ $user['email'] }})</x-secondary-button>
								@endforeach
							</div>
						</div>
						<div class="mt-2 flex-col w-1/2">
							<h2 class="text-lg dark:text-white text-black">Selected Users</h2>
							<div class="flex items-center flex-wrap ml-6">
								@foreach($selectedUsers as $user)
								<x-secondary-button
									wire:click='removeSelectedUser({{ $user["id"] }})'
									class="rounded-3xl m-1 text-xs self-center p-1 border-1 border-slate-500 dark:border-orange-100 duration-300 transition-all hover:ring-1 hover:bg-red-300 dark:hover:bg-red-700">{{ $user['name'] }} <br/> ({{ $user['email'] }})</x-secondary-button>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</x-slot>

			<x-slot name="footer">
                <a wire:loading.attr="disabled" class="self-center text-justify text-sm dark:text-gray-200 text-black max-w-max" >
                    {{ __('View/Edit List of Other Students that are currently enrolled in this educational institute') }}
                </a>
				<div class="justify-end space-x-2">
					<x-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
						{{ __('Cancel') }}
					</x-secondary-button>

					<x-danger-button wire:click="clearSelectedUsers" wire:loading.attr="disabled">
						{{ __('Clear Selected Users') }}
					</x-danger-button>

					<x-button class="ms-3" wire:click="enrollSelectedUsers" wire:loading.attr="disabled">
						{{ __('Enroll Selected Users') }}
					</x-button>
				</div>
            </x-slot>
        </x-dialog-modal-custom>

</div>
