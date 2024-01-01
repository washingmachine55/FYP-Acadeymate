<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    // public function update(UpdateUserRequest $request, User $user): View
    // {
    //     $user->name = $request->name;
    //     $user->email = $request->email;

    //     //Original Code
    //     // if (auth()->user()->can('edit-educational-institutes')) {
    //     if (auth()->user()->Permission::can('edit-educational-institutes')) {
    //         $user->password = $request->password;
    //     }

    //     $user->save();

    //     return view('users.show')->with([
    //         'user' => $user,
    //     ]);
    // }

	public function index()
	{
    	$users = \App\Models\User::all();
    	return view('livewire.view-users', ['users' => $users]);
	}

}
