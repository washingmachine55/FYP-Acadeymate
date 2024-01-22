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
					<th wire:click="sortBy('name','null')">Guardian Name @if ($sortColumn === 'name') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('email','null')">Guardian E-mail @if ($sortColumn === 'email') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('user_role','null')">Relationship with Student @if ($sortColumn === 'user_role') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('institute_name','null')">Student Name @if ($sortColumn === 'institute_name') <span>&#8595;</span> @endif</th>
					<th wire:click="sortBy('institute_name','null')">Student Email @if ($sortColumn === 'institute_name') <span>&#8595;</span> @endif</th>
					{{-- <th>Enrolled Under</th> --}}
					{{-- <th>Joined At</th> --}}
					<th>Last Modified</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($guardians as $guardian)
					@foreach ($guardian->usersAsGuardian as $userAsGuardian)
					<tr>
						<td>{{ $userAsGuardian->id }}</td>
						<td>
							<a href="{{ route('user-profile.show', $userAsGuardian->id) }}">{{ $userAsGuardian->name }}</a>
						</td>
						<td>{{ $userAsGuardian->email }}</td>
						<td>{{ $guardian->guardian_relationship_with_user }}</td>

					@foreach ($guardian->usersAsDependant as $userAsDependant)
						<td>
							<a href="{{ route('user-profile.show', $userAsDependant->id) }}">{{ $userAsDependant->name }}</a>
						</td>
						<td>{{ $guardian->created_at }}</td>
					@endforeach
					</tr>
					@endforeach
				@endforeach
			</tbody>
	</table>
</div>
