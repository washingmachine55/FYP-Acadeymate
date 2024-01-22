<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\User;
use Illuminate\Support\Facades\DB;


class ViewGuardians extends Component
{
	public $title = 'View All Guardians';

	public $sortColumn = 'id';
	public $sortDirection = 'asc';

	// public $guardians = [];


    public function render()
    {
        // return view('livewire.view-guardians');
		// $guardians = \App\Models\Guardian::select('id', 'guardian_relationship_with_user', 'guardian_user_id', 'guardian_of_user_id')
		// 	->with(['users' => function ($query) {
		// 		$query->select('users.id', 'name', 'email', 'user_role');
		// 	}])
		// 	->get();

		//working codde but needs improvements
		/* $guardians = DB::table('users')
			->join('guardians', 'users.id', '=', 'guardians.guardian_user_id')
			->select('users.id', 'users.name', 'users.email', 'users.user_role', 'guardians.id', 'guardians.guardian_relationship_with_user', 'guardians.guardian_user_id', 'guardians.guardian_of_user_id', 'guardians.created_at', 'guardians.updated_at')
			->get();

		$guardiansOfUsers = DB::table('users')
			->join('guardians', 'users.id', '=', 'guardians.guardian_of_user_id')
			->select('users.id', 'users.name', 'users.email', 'users.user_role', 'guardians.guardian_relationship_with_user', 'guardians.guardian_user_id', 'guardians.guardian_of_user_id')
			->get();

		return view('livewire.view-guardians', [
			'guardians' => $guardians,
			'guardiansOfUsers' => $guardiansOfUsers,
		]); */

		$guardians = \App\Models\Guardian::with(['usersAsGuardian' => function ($query) {
			$query->select('users.id', 'users.name', 'users.email');
		}, 'usersAsDependant' => function ($query) {
			$query->select('users.id', 'users.name', 'users.email', 'users.user_role');
		}])->get();

		dd($guardians);

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
