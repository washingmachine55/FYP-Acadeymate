<x-confirmation-modal wire:model="showingModal">
	<x-slot name="title">
		{{ __('Delete API Token') }}
	</x-slot>

	<x-slot name="content">
		{{ __('Are you sure you would like to delete this API token?') }}
	</x-slot>

	<x-slot name="footer">
		{{-- <x-secondary-button wire:click="$toggle('confirmingEnrollingUser')" wire:loading.attr="disabled"> --}}
		<x-secondary-button wire:click="$set('showingModal', false)" wire:loading.attr="disabled">
			{{ __('Cancel') }}
		</x-secondary-button>

		{{-- <x-danger-button class="ms-3" wire:click="deleteApiToken" wire:loading.attr="disabled">
			{{ __('Delete') }}
		</x-danger-button> --}}
	</x-slot>
</x-confirmation-modal>
