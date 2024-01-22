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
				@foreach ($guardians as $guardian)
					@foreach ($guardian->users as $user)
						<tr>
							<td>{{ $guardian->guardian_name }}</td>
							<td>{{ $guardian->user->name }}</td>
							<td>{{ $guardian->user->email }}</td>
							<td>{{ $guardian->user->user_role }}</td>
						</tr>
					@endforeach
				@endforeach
			</tbody>
	</table>
</div>
