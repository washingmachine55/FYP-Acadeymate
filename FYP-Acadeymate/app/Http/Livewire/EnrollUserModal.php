<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EnrollUserModal extends Component
{
	public $showModal = false;
	public $searchQuery = '';
	public $users = [];
	public $selectedUsers = [];
	public $selectedUserIds = [];

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

		// If the search query is empty, clear the search results and return
		if (empty($this->searchQuery)) {
			$this->users = [];
			return;
		}
	}

	public function updatedSearchQuery()
	{
		// If the search query is empty, clear the search results and return
		if (empty($this->searchQuery)) {
			$this->users = [];
			return;
		}

		// Get the IDs of the selected users
		$selectedUserIds = array_column($this->selectedUsers, 'id');

		$this->users = \App\Models\User::where(function ($query) {
			$query->where('name', 'like', '%' . $this->searchQuery . '%')
					->orWhere('email', 'like', '%' . $this->searchQuery . '%');
		})
		->whereNotIn('id', $selectedUserIds)
		->take(7)
		->get()
		->toArray();



	}

	public function removeSelectedUser($userId)
	{
		$this->selectedUsers = array_filter($this->selectedUsers, function ($user) use ($userId) {
			return $user['id'] !== $userId;
		});

		// Re-index the array
		$this->selectedUsers = array_values($this->selectedUsers);
	}

	public function selectSearchedUser()
	{
		// If there's only one user in the search results, add them to the selected users
		if (count($this->users) === 1) {
			$this->selectedUsers[] = $this->users[0];
			$this->searchQuery = ''; // Clear the search query
			$this->users = []; // Clear the search results
		}
	}

	public function selectClickedUser($userId)
	{
		$user = \App\Models\User::find($userId)->toArray();

		// Check if the user is not already selected
		if (!in_array($user, $this->selectedUsers)) {
			$this->selectedUsers[] = $user;
		}
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
