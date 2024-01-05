<x-app-layout>
	<div class="p-7">
		<table class="dark:text-gray-200 text-gray-800 text-xl">
			<thead class="dark:bg-orange-900 bg-orange-100 h-14 text-left">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($educationalInstitutes as $educationalInstitute)
				<tr class="flex-row even:dark:bg-slate-700 table-row-hover even:bg-gray-50 border-b-2 text-lg h-16" x-data="{ editing: false }">
					<td class="" x-show="editing">{{ $educationalInstitute->id }}</td>

					<td class="" x-show="!editing">{{ $educationalInstitute->name }}</td>
					<td class="" x-show="editing">
						<x-input value="{{ $educationalInstitute->name }}" />
						</td>

						{{-- <td class="">{{ $educationalInstitute->name }}</td> --}}
						<td class="">{{ $educationalInstitute->email }}</td>
						<td class="">{{ $educationalInstitute->created_at }}</td>
						<td class=" justify-content-center align-items-center">
							<div class=" inline-flex space-x-4">

								<x-button x-show="!editing" @click="editing = true; $store.table.toggleEditing()">Edit</x-button>
								<x-button x-show="editing" @click="editing = false; $store.table.toggleEditing(); $wire.updateInstitute({{ $educationalInstitute->id }}, name)">Save</x-button>

								@can('delete-courses')
								<form method="POST" action="{{ route('EducationalInstitute.destroy', $educationalInstitute->id) }}" >
									@csrf
									@method('DELETE')
									<x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete this educational institute?')">Delete</x-danger-button>
								</form>
								@endcan

							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</x-app-layout>
