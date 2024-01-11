<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class EnrollUserModal extends Component
{
	public $showingModal = false;

    public $listeners = [
        'hideMe' => 'hideModal'
    ];

    public function showModal(){
        $this->showingModal = true;
    }

    public function hideModal(){
        $this->showingModal = false;
    }

    public function render()
    {
        return view('livewire.enroll-user-modal');
    }
}
