<?php

namespace App\Livewire;

use Livewire\Component;

class ViewUsers extends Component
{
	public $users;
	public $title = 'View Users';
	public $header = 'View Users';

	public function mount() {


		// $this->users = \App\Models\User::all();
		// create a query to get all users as well as the institutes they are enrolled under
		$this->users = \App\Models\User::with('educationalInstitutes')->get();

		return view('livewire.view-users', ['users' => 'users']);

		// // if ($search = 'Developer/Super Admin') {
		// // 	$this->users = \App\Models\User::where('user_role', 'Developer/Super Admin')->orderByDesc('user_role')->get();
		// // 	return view('livewire.view-users', ['users' => 'users']);
	}

    public function render()
    {
        return view('livewire.view-users');
	}

}
