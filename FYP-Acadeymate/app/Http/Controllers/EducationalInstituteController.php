<?php

namespace App\Http\Controllers;

use App\Models\EducationalInstitute;
use App\Http\Requests\StoreEducationalInstituteRequest;
use App\Http\Requests\UpdateEducationalInstituteRequest;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class EducationalInstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$this->authorize('EducationalInstitute.index');
		return view('livewire.create-educational-institute');
    }

	public function __invoke()
	{
		return view('livewire.create-educational-institute');
	}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$this->authorize('EducationalInstitute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationalInstituteRequest $request)
    {
        Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();

        return DB::transaction(function () use ($request) {
            return tap(EducationalInstitute::create([
                'name' => $request['name'],
                'email' => $request['email'],
            ]), function () {
                return dd('Educational Institute Created Successfully');
            });
        });
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
    public function destroy(EducationalInstitute $educationalInstitute)
    {
        //
    }
}
