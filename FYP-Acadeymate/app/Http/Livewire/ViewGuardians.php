<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\User;

class ViewGuardians extends Component
{
	public $title = 'View All Guardians';

	public $sortColumn = 'id';
	public $sortDirection = 'asc';

	public $guardians;


    public function render()
    {
        // return view('livewire.view-guardians');
		// $guardians = \App\Models\Guardian::select('id', 'guardian_relationship_with_user', 'guardian_user_id', 'guardian_of_user_id')
		// 	->with(['users' => function ($query) {
		// 		$query->select('users.id', 'name', 'email', 'user_role');
		// 	}])
		// 	->get();

		$guardians = \App\Models\Guardian::select('id', 'guardian_relationship_with_user', 'guardian_user_id', 'guardian_of_user_id')
		->get();

		foreach ($guardians as $guardian) {
			dd($guardian->users);
		};


		return view('livewire.view-guardians', [
			'guardians' => $guardians,
		]);
    }

	// public function sortBy($column, $sortDirection)
	// {
	// 	$this->sortColumn = $column;
	// 	$this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';


	// 	if ($this->sortColumn == 'institute_name') {
	// 		$this->users = \App\Models\User::with('guardians')
	// 		->select('users.*', 'educational_institutes.name as institute_name')
	// 		->leftJoin('enrolled_under', 'users.id', '=', 'enrolled_under.user_id')
	// 		->leftJoin('educational_institutes', 'enrolled_under.educational_institute_id', '=', 'educational_institutes.id')
	// 		->orderBy('educational_institutes.name', $this->sortDirection)
	// 		->get();
	// 	} else {
	// 		$this->users = \App\Models\User::with('educationalInstitutes')
	// 		->orderBy($this->sortColumn, $this->sortDirection)
	// 		->get();
	// 	}

	// 	return view('livewire.view-guardians', [
	// 		'users' => 'users',
	// 	]);


	// }
}
