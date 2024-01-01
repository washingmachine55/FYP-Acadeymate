<div class="flex p-8 min-w-fit">
	<table class="space-x-3 dark: text-gray-200 text-xl table-auto ">

		<div>
			<thead class="dark:bg-slate-600 p-5 h-14">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>User Role</th>
					<th>Joined At</th>
					<th>Actions</th>
				</tr>
			</thead>
		</div>

		<div class="mt-10 pt-20">
			<tbody class="pt-20 " >
				@foreach ($users as $user)
				<tr class="flex-row even:dark:bg-slate-700 h-16">
					<td class="pr-14 pl-6">{{ $user->name }}</td>
					<td class="pr-14">{{ $user->email }}</td>
					<td class="pr-14">{{ $user->user_role }}</td>
					<td class="pr-14">{{ $user->created_at }}</td>
					<td class="">
						<div class="flex space-x-4 justify-center flex-row w-52 justify-content-center align-items-center">
							<x-button>Edit</x-button>
							<x-danger-button>Delete</x-danger-button>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</div>
	</table>
</div>
