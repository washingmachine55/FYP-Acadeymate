<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EducationalInstitute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEducationalInstituteRequest;


class ViewEducationalInstitutes extends Component
{
	public $title = 'View All Educational Institutes';

	public $fullname;
	public $useremail;

	public $sortColumn = 'id';
	public $sortDirection = 'asc';

	public $educationalInstitutes;

	/**
	* Display a listing of the resource.
	*/
	// public function index(Request $request)
	// {
	// 	$column = $request->input('sort_column', 'id'); // Default to 'id' column
	// 	$direction = $request->input('sort_direction', 'asc'); // Default to 'asc' direction
	// 	$direction = in_array($direction, ['asc', 'desc']) ? $direction : 'desc'; // Ensure direction is 'asc' or 'desc'

	// 	$educationalInstitutes = EducationalInstitute::orderBy($column, $direction)->get();

	// 	return view('livewire.view-educational-institutes', ['educationalInstitutes' => $educationalInstitutes]);
	// }

	public function mount() {


		// $this->users = \App\Models\User::all();
		// create a query to get all users as well as the institutes they are enrolled under
		$this->educationalInstitutes = EducationalInstitute::with('users')->get();

		return view('livewire.view-educational-institutes', ['educationalInstitutes' => 'educationalInstitutes', 'title' => 'View Users']);

		// // if ($search = 'Developer/Super Admin') {
			// // 	$this->users = \App\Models\User::where('user_role', 'Developer/Super Admin')->orderByDesc('user_role')->get();
			// // 	return view('livewire.view-users', ['users' => 'users']);


	}

	/**
	* Store a newly created resource in storage.
	*/
	public function store(StoreEducationalInstituteRequest $request)
	{
		EducationalInstitute::create($request->only(['name', 'email']));
		return redirect()->route('livewire.view-educational-institutes');
	}

    public function render()
    {
		$educationalInstitutes = EducationalInstitute::all();
		// dd($educationalInstitutes);

		// return view('livewire.view-educational-institutes', [
		// 	'educationalInstitutes' => $educationalInstitutes,
		// 	'title' => 'View Educational Institutes'
		// ]);

		return view('livewire.view-educational-institutes', ['educationalInstitutes' => $educationalInstitutes]);

		dd($educationalInstitutes);
    }

	public function sortBy($column, $sortDirection)
	{
		$this->sortColumn = $column;
		$this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';

		if ($this->sortColumn == 'no_of_enrolled_users') {
			$this->educationalInstitutes = EducationalInstitute::with('users')
				->withCount('users')
				->orderBy('users_count', $this->sortDirection)
				->get();
		} else {
			$this->educationalInstitutes = EducationalInstitute::with('users')
			->orderBy($this->sortColumn, $this->sortDirection)
			->get();
		}

		return view('livewire.view-users', [
			'users' => 'users',
			'title' => 'View Users'
		]);

	}

	public function edit($id)
	{
		$educationalInstitute = EducationalInstitute::find($id);

		// Set the properties to the current user's name and email
		$this->fullname = $educationalInstitute->name;
		$this->useremail = $educationalInstitute->email;

		// Other code...
	}

	/**
	* Update the specified resource in storage.
	*/
	public function update($id)
	{

		$educationalInstitute = EducationalInstitute::find($id);
		// $educationalInstitute->name[] = $request->input(['name', 'email']);
		// $educationalInstitute->save();
		// return response()->json($educationalInstitute);

		if (($this->fullname == null) || ($this->useremail == null)) {
			session()->flash('flash.bannerStyle', 'danger');
			session()->flash('flash.banner', 'Name/Email cannot be null.');
			return redirect()->route('livewire.view-educational-institutes');
		}

		$educationalInstitute->forceFill([
			'name' => $this->fullname,
			'email' => $this->useremail,
		])->save();

		session()->flash('flash.bannerStyle', 'success');
		session()->flash('flash.banner', 'All info for ' . $educationalInstitute->name . ' with the ID ' . $educationalInstitute->id . ', has been updated successfully!');

		return redirect()->route('livewire.view-educational-institutes');

	}

	/**
	* Remove the specified resource from storage.
	*/
	public function destroy($educationalInstitute)
	{

		$instituteToDelete = EducationalInstitute::findOrFail($educationalInstitute);

		DB::transaction(function () use ($instituteToDelete) {
			$instituteToDelete->delete();
		});

		session()->flash('flash.bannerStyle', 'confirmed');
		session()->flash('flash.banner', 'User '. $instituteToDelete->name . ' with the ID ' . $instituteToDelete->id . ', has been deleted and removed successfully!');

		return redirect()->route('livewire.view-educational-institutes');
	}

}
