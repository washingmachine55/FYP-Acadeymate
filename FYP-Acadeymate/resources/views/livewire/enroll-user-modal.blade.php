<div>
        <div class="">
            <x-button wire:click="openTestModal" wire:loading.attr="disabled">
                {{ __('Enroll users') }}
            </x-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="showModal">
            <x-slot name="title">
                {{ __('Enroll users to selected institute') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Please search and add users that you would like to add to this institute') }}

                <div class="mt-4" x-data="{}" x-on:enrolling-users-to-institutes.window="setTimeout(() => $refs.enrollingUsers.focus(), 250)">
                    <x-input type="text" class="mt-1 block w-3/4"
								x-ref="enrollingUsers"
                                placeholder="{{ __('Enter users here') }}"
								wire:keydown.enter="enrollSelectedUsers"
                                />

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="enrollSelectedUsers" wire:loading.attr="disabled">
                    {{ __('Enroll Selected Users') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
</div>
