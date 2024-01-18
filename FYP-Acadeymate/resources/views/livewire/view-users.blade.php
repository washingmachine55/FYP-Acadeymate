@php
    $sortDirection = request('sort_direction', 'desc');
    $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'asc';
@endphp
<div class="p-7" @keyup.escape.window="editing = false" >
@section('title', $title)
	<table class="dark:text-gray-200 text-gray-800 text-xl" >

			<thead class="dark:bg-sky-900 bg-orange-300 h-14 text-left sticky top-7 z-10">
				<tr>
					<th wire:click="sortBy('id','null')">ID @if ($sortColumn === 'id') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('name','null')">Name @if ($sortColumn === 'name') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('email','null')">E-mail @if ($sortColumn === 'email') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('user_role','null')">User Role @if ($sortColumn === 'user_role') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('institute_name','null')">Enrolled Under @if ($sortColumn === 'institute_name') <span>&#8595;</span> @endif</th>
					{{-- <th>Enrolled Under</th> --}}
					<th>Joined At</th>
					<th>Last Modified</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<div hidden>
						<form wire:submit='update({{ $user->id }})' >
								@csrf
								@method('PATCH')
					</div>
				<tr class="flex-row even:dark:bg-slate-700 even:bg-orange-100 table-row-hover hover:bg-orange-300 hover:dark:bg-sky-900 border-b-[1px] text-base h-16"
				x-data="{ editing: false }"
				@keydown.escape.window="editing = false"
				@click.outside.window="editing = false">
					<td class="">{{ $user->id }}</td>
					{{-- <td class=""><a href="{{ route('user-profile.show', $user->id) }}">{{ $user->name }}</a></td> --}}

					<td class="" x-show="!editing" >
						<a
						href="{{ route('user-profile.show', $user->id) }}">{{ $user->name }}</a>
					</td>
					<td class="" x-show="editing">
						<x-input
						name="fullname"
						type="text"
						id="fullname"
						wire:model="fullname"
						value="{{ $user->name }}"
						class="w-3/4 text-base" />
					</td>

					<td class="" x-show="!editing">{{ $user->email }}</td>
					<td class="" x-show="editing">
						<x-input
						name="useremail"
						type="text"
						id="useremail"
						wire:model="useremail"
						value="{{ $user->email }}"
						class="w-3/4 text-base" />
					</td>

					{{-- <td class="">{{ $user->email }}</td> --}}
					<td class="">{{ $user->user_role }}</td>
					@foreach ($user->educationalInstitutes as $institute)
						<td class=""><a href="{{ route('institute-profile', $institute->id) }}">{{ $institute->name }}</a></td>
					@endforeach
					@if ($user->educationalInstitutes->isEmpty())
						<td class="">N/A</td>
					@endif
					<td class="">{{ $user->created_at }}</td>
					<td class="">{{ $user->updated_at }}</td>
					<td class=" justify-content-center align-items-center">
						<div class=" inline-flex space-x-4">
							@can('edit-courses')
							<x-edit-button
								x-show="!editing"
								@click="editing = true; $store.table.toggleEditing()"
								wire:click="edit({{ $user->id }})">Edit</x-edit-button>
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
							<form method="POST" wire:submit='destroy({{ $user->id }})' >
								@csrf
								@method('DELETE')
								<x-delete-button type="submit" onclick="return confirm('Are you sure you want to delete this User?')">Delete</x-delete-button>
							</form>
							@endcan
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
