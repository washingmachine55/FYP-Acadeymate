<x-app-layout>
	{{-- <x-slot name=title> Create Edu Institute</x-slot>
		<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
				{{ __('Dashboard') }}
			</h2>
		</x-slot> --}}

		<div class="flex">

			<x-sidebar class="flex-col col-2"></x-sidebar>

			<div class="mt-6 pl-28">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
					<div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg"
					style="border-radius: 1.5625rem; box-shadow: 2px 0px 4px 1px rgba(0, 0, 0, 0.25);">

					<div class="flex p-8 min-w-fit">
						<table class="space-x-3 dark:text-gray-200 text-gray-800  text-xl table-auto ">

							<div>
								<thead class="dark:bg-orange-900 bg-orange-100 p-5 h-14">
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Created At</th>
										<th>Actions</th>
									</tr>
								</thead>
							</div>

							<div class="mt-10 pt-20">
								<tbody class="pt-20 " >
									@foreach ($educationalInstitutes as $educationalInstitute)
									<tr class="flex-row even:dark:bg-slate-700 even:bg-gray-50 border-b-2 text-lg h-16">
										<td class="pr-14 pl-6">{{ $educationalInstitute->id }}</td>
										<td class="pr-14 pl-6">{{ $educationalInstitute->name }}</td>
										<td class="pr-14">{{ $educationalInstitute->email }}</td>
										<td class="pr-14 pl-6">{{ $educationalInstitute->created_at }}</td>
										<td class="">
											<div class="flex space-x-4 justify-center flex-row w-52 justify-content-center align-items-center">
												<x-button>Edit</x-button>
												@can('delete-courses')

												<form method="POST" action="{{ route('EducationalInstitute.destroy', $educationalInstitute->id) }}" >
													{{-- <form method="GET"  > --}}
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
								</div>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</x-app-layout>
