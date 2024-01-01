<?php

namespace App\Livewire;

use Livewire\Component;

class ViewUsers extends Component
{
	public $users;
	public $title = 'View Users';

	public function mount() {
		$this->users = \App\Models\User::all();
	}

    public function render()
    {
        return view('livewire.view-users');
    }
}
