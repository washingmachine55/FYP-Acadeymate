@php
    $sortDirection = request('sort_direction', 'desc');
    $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'asc';
@endphp
<x-app-layout >
	<div class="p-7" @keyup.escape.window="editing = false" >
		<table class="dark:text-gray-200 text-gray-800 text-xl h-full ">
			<thead class="dark:bg-sky-900 bg-orange-200 h-14 text-left sticky top-7 z-50">
				<tr>
					<th>
						<a wire:navigate href="{{ request()->fullUrlWithQuery(['sort_column' => 'id', 'sort_direction' => $sortDirection == 'desc' ? 'asc' : 'desc']) }}">
							ID
						</a>
					</th>
					<th>
						<a wire:navigate href="{{ request()->fullUrlWithQuery(['sort_column' => 'name', 'sort_direction' => $sortDirection == 'desc' ? 'asc' : 'desc']) }}">
							Name
						</a>
					</th>
					<th>
						<a wire:navigate href="{{ request()->fullUrlWithQuery(['sort_column' => 'email', 'sort_direction' => $sortDirection == 'desc' ? 'asc' : 'desc']) }}">
							Email
						</a>
					</th>
					<th>
						<a wire:navigate href="{{ request()->fullUrlWithQuery(['sort_column' => 'created_at', 'sort_direction' => $sortDirection == 'desc' ? 'asc' : 'desc']) }}">
							Created At
						</a>
					</th>
					<th>
						<a wire:navigate href="{{ request()->fullUrlWithQuery(['sort_column' => 'updated_at', 'sort_direction' => $sortDirection == 'desc' ? 'asc' : 'desc']) }}">
							Modified At
						</a>
					</th>
					@can('edit-courses')
					<th class="text-center">Actions</th>
					@endcan
				</tr>
			</thead>
			<tbody>
				@foreach ($educationalInstitutes as $educationalInstitute)
					<div hidden>
						<form method="POST" action="{{ route('EducationalInstitute.update', $educationalInstitute->id) }}" >
								@csrf
								@method('PATCH')
					</div>
				<tr class=" flex-row even:dark:bg-slate-700 table-row-hover even:bg-gray-50 border-b-2 text-base h-16"
				x-data="{ editing: false }"
				@keydown.escape.window="editing = false"
				@click.outside.window="editing = false">
				{{--
					x-data="{ editing: false }" // sets an initial value for editable components to be hidden
					@keydown.escape.window="editing = false" // keydown of escape key hides the editable components
					@click.outside.window="editing = false"   // clicking anywhere outside the row hides the editable components as well
				--}}
					<td class="" >{{ $educationalInstitute->id }}</td>

					<td class="" x-show="!editing" ><a href="{{ route('institutes.show', $educationalInstitute->id) }}">{{ $educationalInstitute->name }}</a></td>
					<td class="" x-show="editing">
						<x-input name="fullname" type="text" id="fullname" value="{{ $educationalInstitute->name }}" class="w-3/4 text-base" />
					</td>
					<td class="" x-show="!editing">{{ $educationalInstitute->email }}</td>
					<td class="" x-show="editing">
						<x-input name="useremail" type="text" id="useremail" value="{{ $educationalInstitute->email }}" class="w-3/4 text-base" />
					</td>

						<td class="">{{ $educationalInstitute->created_at }}</td>
						<td class="">{{ $educationalInstitute->updated_at }}</td>
						<td class=" justify-content-center align-items-center">
							<div class=" inline-flex space-x-4">
								@can('edit-courses')
								<x-edit-button x-show="!editing" @click="editing = true; $store.table.toggleEditing()">Edit</x-edit-button>
										<x-save-button
										type="submit"
										x-show="editing"
										@click="editing = false; $store.table.toggleEditing(); " >Save</x-save-button>
										{{-- $wire.update({{ $educationalInstitute->id }}, institute.name) --}}
								</form>
								@endcan
								@can('delete-courses')
								<form method="POST" action="{{ route('EducationalInstitute.destroy', $educationalInstitute->id) }}" >
									@csrf
									@method('DELETE')
									<x-delete-button type="submit" onclick="return confirm('Are you sure you want to delete this educational institute?')">Delete</x-delete-button>
								</form>
								@endcan
								<div class="z-[999]" >
											@livewire('enroll-user-modal', ['educationalInstitute' => $educationalInstitute])
								</div>

							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
</x-app-layout>
