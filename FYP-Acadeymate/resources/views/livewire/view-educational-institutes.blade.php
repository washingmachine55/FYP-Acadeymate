@php
    $sortDirection = request('sort_direction', 'desc');
    $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'asc';
@endphp
<div class="p-7" @keyup.escape.window="editing = false" >
	<table class="dark:text-gray-200 text-gray-800 text-xl h-full ">
		<thead class="dark:bg-sky-900 bg-orange-300 h-14 text-left sticky top-7 z-10">
			<tr>
				<th wire:click="sortBy('id','null')">ID @if ($sortColumn === 'id') <span>&#8595;</span> @endif</th>
				<th wire:click="sortBy('name','null')">Name @if ($sortColumn === 'name') <span>&#8595;</span> @endif</th>
				<th wire:click="sortBy('email','null')">E-mail @if ($sortColumn === 'email') <span>&#8595;</span> @endif</th>
				<th wire:click="sortBy('no_of_enrolled_users','null')">No. of Enrolled Users @if ($sortColumn === 'no_of_enrolled_users') <span>&#8595;</span> @endif</th>
				<th wire:click="sortBy('created_at','null')">Created At @if ($sortColumn === 'created_at') <span>&#8595;</span> @endif</th>
				<th wire:click="sortBy('updated_at','null')">Modified At @if ($sortColumn === 'updated_at') <span>&#8595;</span> @endif</th>
				@can('edit-courses')
				<th class="text-center">Actions</th>
				@endcan
			</tr>
		</thead>
		<tbody>
			@foreach ($educationalInstitutes as $educationalInstitute)
				<div hidden>
					<form wire:submit='update({{ $educationalInstitute->id }})' >
							@csrf
							@method('PATCH')
				</div>
			<tr class=" flex-row even:dark:bg-slate-700 table-row-hover even:bg-orange-100 hover:bg-orange-300 hover:dark:bg-sky-900 border-b-[1px] text-base h-16"
			x-data="{ editing: false }"
			@keydown.escape.window="editing = false"
			@click.outside.window="editing = false">
			{{--
				x-data="{ editing: false }" // sets an initial value for editable components to be hidden
				@keydown.escape.window="editing = false" // keydown of escape key hides the editable components
				@click.outside.window="editing = false"   // clicking anywhere outside the row hides the editable components as well
			--}}
				<td class="" >{{ $educationalInstitute->id }}</td>

				<td class="" x-show="!editing" ><a href="{{ route('institute-profile', $educationalInstitute->id) }}">{{ $educationalInstitute->name }}</a></td>
				<td class="" x-show="editing">
					<x-input name="fullname" wire:model='fullname' type="text" id="fullname" value="{{ $educationalInstitute->name }}" class="w-3/4 text-base" />
				</td>
				<td class="" x-show="!editing">{{ $educationalInstitute->email }}</td>
				<td class="" x-show="editing">
					<x-input name="useremail" wire:model='useremail' type="text" id="useremail" value="{{ $educationalInstitute->email }}" class="w-3/4 text-base" />
				</td>

					<td class="">
						@if ($educationalInstitute->users->isEmpty())
							N/A
						@else
							{{ $educationalInstitute->users->count() }}
						@endif
					</td>

					<td class="">{{ $educationalInstitute->created_at }}</td>
					<td class="">{{ $educationalInstitute->updated_at }}</td>
					<td class=" justify-content-center align-items-center">
						<div class=" inline-flex space-x-4">
							@can('edit-courses')
							<x-edit-button
							x-show="!editing"
							@click="editing = true; $store.table.toggleEditing()"
							wire:click='edit({{ $educationalInstitute->id }})'>Edit</x-edit-button>
									<x-save-button
									type="submit"
									x-show="editing"
									@click="editing = false; $store.table.toggleEditing(); "
									wire:click='$refresh'
									>Save</x-save-button>
									{{-- $wire.update({{ $educationalInstitute->id }}, institute.name) --}}
							</form>
							@endcan
							@can('delete-courses')
							<form method="POST" wire:submit='destroy({{ $educationalInstitute->id }})' >
								@csrf
								@method('DELETE')
								<x-delete-button type="submit" onclick="return confirm('Are you sure you want to delete this educational institute?')">Delete</x-delete-button>
							</form>
							@endcan
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
