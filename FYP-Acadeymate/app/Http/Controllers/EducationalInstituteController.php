<?php

namespace App\Http\Controllers;

use App\Models\EducationalInstitute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreEducationalInstituteRequest;
use App\Http\Requests\UpdateEducationalInstituteRequest;

class EducationalInstituteController extends Controller
{
	public $title;
	// public $column;
	// public $direction;

	public $educationalInstitutes;
	public function __construct() {
		// protected UserRepository $users,
	}

	public function render() {
		// return view('create-educational-institute');
	}


	/**
	* Display a listing of the resource.
	*/
	public function index(Request $request)
	{
		$column = $request->input('sort_column', 'id'); // Default to 'id' column
		$direction = $request->input('sort_direction', 'asc'); // Default to 'asc' direction
		$direction = in_array($direction, ['asc', 'desc']) ? $direction : 'desc'; // Ensure direction is 'asc' or 'desc'

		$educationalInstitutes = EducationalInstitute::orderBy($column, $direction)->get();

		return view('livewire.view-educational-institutes', ['educationalInstitutes' => $educationalInstitutes]);
	}

	/**
	* Show the form for creating a new resource.
	*/
	public function create()
	{
		return view('livewire.create-educational-institute');
	}

	/**
	* Store a newly created resource in storage.
	*/
	public function store(StoreEducationalInstituteRequest $request)
	{
		EducationalInstitute::create($request->only(['name', 'email']));
		return redirect()->route('livewire.view-educational-institutes');
	}

	/**
	* Display the specified resource.
	*/
	public function show($id)
	{
		$educationalInstitute = EducationalInstitute::findOrFail($id);
		$this->title = $educationalInstitute->name;
		return view('livewire.institute-profile', ['educationalInstitute' => $educationalInstitute, 'title' => $educationalInstitute->name]);
	}

	/**
	* Show the form for editing the specified resource.
	*/
	public function edit(EducationalInstitute $educationalInstitute)
	{
		//
	}

	/**
	* Update the specified resource in storage.
	*/
	// public function update(UpdateEducationalInstituteRequest $request, EducationalInstitute $educationalInstitute)
	// {
		//     //
		// }
		public function update(Request $request, $id)
		{

			$educationalInstitute = EducationalInstitute::find($id);
			// $educationalInstitute->name[] = $request->input(['name', 'email']);
			// $educationalInstitute->save();
			// return response()->json($educationalInstitute);

			$educationalInstitute->forceFill([
				'name' => $request->input(['fullname']),
				'email' => $request->input(['useremail']),
				])->save();

				return redirect()->route('livewire.view-educational-institutes')->with('success', 'Educational Institute edited successfully.');

			}

			/**
			* Remove the specified resource from storage.
			*/
			public function destroy($educationalInstitute)
			{

				$userToDelete = EducationalInstitute::findOrFail($educationalInstitute);

				DB::transaction(function () use ($userToDelete) {
					$userToDelete->delete();
				});

				return redirect()->route('livewire.view-educational-institutes')->with('success', 'Educational Institute deleted successfully.');
			}

		}
