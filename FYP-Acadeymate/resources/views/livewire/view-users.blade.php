<div class="p-7">
	<table class="dark:text-gray-200 text-gray-800 text-xl">

			<thead class="dark:bg-orange-900 bg-orange-100 h-14 text-left">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>User Role</th>
					<th>Enrolled Under</th>
					<th>Joined At</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr class="flex-row even:dark:bg-slate-700 table-row-hover even:bg-gray-50 border-b-2 text-lg h-16">
					<td class=""><a href="{{ route('user-profile.show', $user->id) }}">{{ $user->name }}</a></td>
					<td class="">{{ $user->email }}</td>
					// nned to fix this forEach statement
					@foreach ($user->educationalInstitutes as $institute)
						@if ($user->educationalInstitutes)
							<td class="">{{ $institute->name }}</td>
						@elseif ($institute->null)
							<td class="">N/A</td>
						@endif
					@endforeach
					<td class="">{{ $user->created_at }}</td>
					<td class="justify-content-center align-items-center">
						<div class="space-x-4">
							<x-button>Edit</x-button>
							@can('delete-courses')
								{{-- Temporary testing --}}
								<x-danger-button>Delete</x-danger-button>
							@endcan
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
