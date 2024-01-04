<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
	Route::get('/component-test-dashboard', function () {
        return view('component-test-dashboard');
    })->name('component-test-dashboard');
	Route::get('/user-actions',function () {
	return view('user-actions');
	})->name('user-actions');
});

// Provide routes to permissions
Route::middleware('auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
	)->group(function () {
    Route::get(
        '/users/create',
        [\App\Http\Controllers\UserController::class, 'create']
    );
	// the code below wont work because it is a livewire component
	Route::get('/user-actions/view-users',\App\Livewire\ViewUsers::class)->name('livewire.view-users');

    Route::post(
        '/users',
        [\App\Http\Controllers\UserController::class, 'store']
    );
});

// using middleware to check if user has admin role for accessing users route
Route::middleware('role:admin')->get('/users', function () {
    // ...
});

//for tesing purposes, APIs specificallly
Route::get('/profiles/{user}', 'App\Http\Controllers\ProfilesController@index');
