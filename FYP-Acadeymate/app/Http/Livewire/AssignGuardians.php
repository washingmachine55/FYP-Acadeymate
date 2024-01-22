<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AssignGuardians extends Component
{
	public $title = 'Assign Guardians';

    public function render()
    {
        return view('livewire.assign-guardians');
    }
}
