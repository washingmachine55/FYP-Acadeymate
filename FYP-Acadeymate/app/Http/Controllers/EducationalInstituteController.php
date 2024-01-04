<?php

namespace App\Http\Controllers;

use App\Models\EducationalInstitute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEducationalInstituteRequest;
use App\Http\Requests\UpdateEducationalInstituteRequest;

class EducationalInstituteController extends Controller
{

	public $educationalInstitutes;
    public function __construct() {
        // protected UserRepository $users,
    }

	public function render() {
		return view('create-educational-institute');
	}

	/**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $educationalInstitutes = EducationalInstitute::all();
		$educationalInstitutes = \App\Models\EducationalInstitute::all();
		return view('livewire.view-educational-institutes', ['educationalInstitutes' => $educationalInstitutes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationalInstituteRequest $request)
    {
        EducationalInstitute::create($request->only(['name', 'email']));
        return redirect()->route('user-actions');
    }

    /**
     * Display the specified resource.
     */
    public function show(EducationalInstitute $educationalInstitute)
    {
        //
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
    public function update(UpdateEducationalInstituteRequest $request, EducationalInstitute $educationalInstitute)
    {
        //
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

        return redirect()->route('livewire.view-educational-institutes')->with('success', 'Educational Institute deleted successfully.') <<< 'HTML'
		<div class="alert alert-success">
			<strong>Success!</strong> Educational Institute deleted successfully.
		</div>
		HTML;
    }
}
