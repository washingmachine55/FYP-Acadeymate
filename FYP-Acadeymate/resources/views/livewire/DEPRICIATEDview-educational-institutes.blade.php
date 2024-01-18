<x-app-layout >
	<div class="p-7" @keyup.escape.window="editing = false" >
		<table class="dark:text-gray-200 text-gray-800 text-xl">
			<thead class="dark:bg-sky-900 bg-orange-100 h-14 text-left">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th>Modified At</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody
			x-data="formHandler()">


				@foreach ($educationalInstitutes as $educationalInstitute)
				<tr class=" flex-row even:dark:bg-slate-700 table-row-hover even:bg-gray-50 border-b-2 text-base h-16"
				x-data="{ ...formHandler(), editing: false }"
				x-init="init({{ $educationalInstitute->toJson() }})"
				@keydown.escape.window="editing = false"
				{{-- @click.outside.window="editing = false" --}}
				>
				{{--
					x-data="{ editing: false }" // sets an initial value for editable components to be hidden
					@keydown.escape.window="editing = false" // keydown of escape key hides the editable components
					@click.outside.window="editing = false"   // clicking anywhere outside the row hides the editable components as well
				--}}

					<td class="" >{{ $educationalInstitute->id }}</td>

					<td class="" x-show="!editing">{{ $educationalInstitute->name }}</td>
					<td class="" x-show="editing">
						<x-input name="name" type="text" id="name" x-model.live="institute.name" value="{{ $educationalInstitute->name }}" class="w-3/4 text-base" />

					</td>

					<td class="" x-show="!editing">{{ $educationalInstitute->email }}</td>
					<td class="" x-show="editing">
						<x-input name="email" type="text" id="email" x-model="institute.email" value="{{ $educationalInstitute->email }}" class="w-3/4 text-base" />
					</td>

						<td class="">{{ $educationalInstitute->created_at }}</td>
						<td class="">{{ $educationalInstitute->updated_at }}</td>
						<td class=" justify-content-center align-items-center">
							<div class=" inline-flex space-x-4">

								@can('edit-courses')
								<x-edit-button x-show="!editing" @click="editing = true; $store.table.toggleEditing()">Edit</x-edit-button>

								<form method="POST" action="{{ route('EducationalInstitute.update', $educationalInstitute->id) }}" @submit.prevent="submit" >
									@csrf
									@method('PATCH')
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

							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>


</x-app-layout>
<script>
function formHandler() {
    return {
		editing: false,
        institute: {},
        init(institute) {
            this.institute = institute;
        },
        submit() {
            let formData = new FormData();
            for (let key in this.institute) {
                formData.append(key, this.institute[key]);
            }
			formData.append('_method', 'PUT');
            fetch(`/EducationalInstitute/${this.institute.id}`, {
				method: 'POST',
				headers: {
					'X-Requested-With': 'XMLHttpRequest',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
				},
				body: formData,
			})
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    }
}
</script>

