<div class="z-[999]">
        <div class="">
            <x-button wire:click="openTestModal" wire:loading.attr="disabled">
                {{ __('Enroll users') }}
            </x-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal-custom wire:model.live="showModal" class="{{ $showModal ? 'block' : 'hidden' }} " style="overflow-y: scroll !important;">
            <x-slot name="title">
                {{ __('Enroll users to selected institute') }}
            </x-slot>

            <x-slot name="content">
                {{ __("Please search and add users that you would like to add to this institute.") }}
				<br/>
				<italic>{{ __("When there's at least 1 user in the search result, press enter to select the user ") }}</italic>

                <div class="mt-4" x-data="{}" x-on:enrolling-users-to-institutes.window="setTimeout(() => $refs.enrollingUsers.focus(), 250)">
				<div class="flex flex-row justify-around">
					<x-input type="text" class="mt-1 block w-3/4 float-start"
					wire:model.live.debounce.150ms="searchQuery"
					x-ref="enrollingUsers"
					placeholder="{{ __('Enter User\'s Name or Email here') }}"
					wire:keydown.enter="selectSearchedUser"
					/> <x-button class="mt-1 block float-end" wire:click='clearSearchBox'>Clear Results</x-button>
					</div>


					<div class="flex w-full text-center place-content-evenly text-nowrap">
						<div class="mt-2 flex-col w-1/2">
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
							<div class="flex items-center flex-wrap">
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
                <a wire:loading.attr="disabled" class="self-center text-justify pr-14 text-xs hover:underline dark:text-gray-200 text-black" >
                    {{ __('View/Edit List of Other Students that are ') }} <br/>
					{{ __('currently enrolled in this educational institute') }}
                </a>
				<div class="justify-end">
					<x-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
						{{ __('Cancel') }}
					</x-secondary-button>

					<x-button class="ms-3" wire:click="enrollSelectedUsers" wire:loading.attr="disabled">
						{{ __('Enroll Selected Users') }}
					</x-button>
				</div>
            </x-slot>
        </x-dialog-modal-custom>
</div>
<script>
    window.addEventListener('beforeunload', () => {
        localStorage.setItem('showModal', @this.showModal);
    });

    document.addEventListener('DOMContentLoaded', () => {
        @this.set('showModal', localStorage.getItem('showModal') === 'true');
    });
</script>
