<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use \App\Models\User;

class ViewUsers extends Component
{
	use WithPagination;

	public $sortColumn = 'id';
	public $sortDirection = 'asc';

	public $users;
	public $title = 'View All Users';
	public $header = 'View Users';

	public $fullname;
	public $useremail;

	public function mount() {


	// $this->users = \App\Models\User::all();
	// create a query to get all users as well as the institutes they are enrolled under
	$this->users = \App\Models\User::with('educationalInstitutes')->get();

	return view('livewire.view-users', ['users' => 'users', 'title' => 'View Users']);

	// // if ($search = 'Developer/Super Admin') {
		// // 	$this->users = \App\Models\User::where('user_role', 'Developer/Super Admin')->orderByDesc('user_role')->get();
		// // 	return view('livewire.view-users', ['users' => 'users']);


	}

	public function render()
	{
		// return view('livewire.view-users');
		$users = \App\Models\User::with('educationalInstitutes')->get();

		return view('livewire.view-users', [
			'users' => 'users',
			'title' => 'View Users'
		]);

	}

	public function sortBy($column, $sortDirection)
	{
		$this->sortColumn = $column;
		$this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';


		if ($this->sortColumn == 'institute_name') {
			$this->users = \App\Models\User::with('educationalInstitutes')
			->select('users.*', 'educational_institutes.name as institute_name')
			->leftJoin('enrolled_under', 'users.id', '=', 'enrolled_under.user_id')
			->leftJoin('educational_institutes', 'enrolled_under.educational_institute_id', '=', 'educational_institutes.id')
			->orderBy('educational_institutes.name', $this->sortDirection)
			->get();
		} else {
			$this->users = \App\Models\User::with('educationalInstitutes')
			->orderBy($this->sortColumn, $this->sortDirection)
			->get();
		}

		return view('livewire.view-users', [
			'users' => 'users',
			'title' => 'View Users'
		]);


	}

	/**
	* .
	*/
	public function edit($id)
	{
		$user = User::find($id);

		// Set the properties to the current user's name and email
		$this->fullname = $user->name;
		$this->useremail = $user->email;

		// Other code...
	}
	/**
	* Update the specified resource in storage.
	*/
	// public function update(Request $request, $id)
	public function update($id)
	{
		$user = User::find($id);

		$user->forceFill([
			'name' => $this->fullname,
			'email' => $this->useremail,
		])->save();

		session()->flash('flash.bannerStyle', 'success');
		session()->flash('flash.banner', 'All user info for ' . $user->name . ' with the ID ' . $id . ', has been updated successfully!');

		return redirect()->route('livewire.view-users');
		// ->with('success', 'User info edited successfully.');

		// this below wont work because navigate doesnt cause a refresh
		// return $this->redirect('/user-actions/view-users', navigate: true );

	}

	/**
	* Remove the specified resource from storage.
	*/
	public function destroy($id)
	{

		$userToDelete = User::findOrFail($id);
		$nameOfUserToDelete = $userToDelete->name;

		DB::transaction(function () use ($userToDelete) {
			$userToDelete->delete();
		});

		session()->flash('flash.bannerStyle', 'confimed');
		session()->flash('flash.banner', 'User '. $nameOfUserToDelete . ' with the ID ' . $id . ', has been deleted and removed successfully!');

		return redirect()->route('livewire.view-users')->with('success', 'User deleted successfully.');
	}

}
