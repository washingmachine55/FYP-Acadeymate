<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EnrollUserModal extends Component
{
	public $showModal = false;

    public function render()
    {
        return view('livewire.enroll-user-modal');
		// return 'hello world';
    }

    public function openTestModal()
    {
        $this->resetErrorBag();
        $this->showModal = true;
		$this->dispatch('enrolling-users-to-institutes');
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

	public function enrollSelectedUsers()
	{
		$this->showModal = false;
	}
}
