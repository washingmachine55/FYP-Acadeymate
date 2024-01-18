<?php

namespace App\Http\Livewire;

use App\Models\EducationalInstitute;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InstituteProfile extends Component
{
	public $educationalInstitute;
	public $title;

	public $showModal = false;
	public $maxWidth = "md";
	public $searchQuery = '';
	public $users = [];
	public $selectedUsers = [];
	public $selectedUserIds = [];

	public function render()
	{
		return view('livewire.institute-profile');
	}

	public function mount($id)
	{
		$this->educationalInstitute = EducationalInstitute::findOrFail($id);
		$this->title = $this->educationalInstitute->name;
	}

	public function openTestModal()
    {
		$this->resetErrorBag();
		$this->showModal = true;
		$this->dispatch('enrolling-users-to-institutes');

		$this->clearSearchBox();
		$this->clearSelectedUsers();

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
		->whereNotIn('id', function ($query) {
			$query->select('user_id')->from('enrolled_under');
		})
		->whereNotIn('id', $selectedUserIds)
		->take(7)
		->get()
		->toArray();
	}

	public function clearSearchBox()
	{
		$this->searchQuery = '';
		$this->users = [];
	}

	public function removeSelectedUser($userId)
	{
		$this->selectedUsers = array_filter($this->selectedUsers, function ($user) use ($userId) {
			return $user['id'] !== $userId;
		});

		// Re-index the array
		$this->selectedUsers = array_values($this->selectedUsers);
	}

	public function clearSelectedUsers()
	{
		// If there's more than one selected user, remove them
		if (count($this->selectedUsers) > 0) {
			$this->selectedUsers = [];
			$this->selectedUserIds = [];
		}
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
			$this->users = array_filter($this->users, function ($user) use ($userId) {
				return $user['id'] !== $userId;
			});
		}
	}

	public function closeModal()
	{
		$this->showModal = false;
    }

	public function enrollSelectedUsers()
	{
		$educationalInstitute = \App\Models\EducationalInstitute::find($this->educationalInstitute->id);

		// Get the IDs of the selected users
		$selectedUserIds = array_column($this->selectedUsers, 'id');

		// Attach the selected users to the institute
		foreach ($selectedUserIds as $userId) {
			$educationalInstitute->users()->attach($userId, ['created_at' => now(), 'updated_at' => now()]);
		}

		$this->clearSearchBox();
		$this->clearSelectedUsers();

		// to use in the banner
		$instituteId = $this->educationalInstitute->id;
		$instituteName = $this->educationalInstitute->name;

		$this->showModal = false;

		session()->flash('flash.bannerStyle', 'success');
		session()->flash('flash.banner', 'All selected users have been enrolled to '. $instituteName .' successfully!');
	}

}
