<?php

use App\Http\Controllers\EducationalInstituteController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SortEducationalInstitutes;

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

Route::resource('EducationalInstitute', EducationalInstituteController::class);


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



	// Route::post('/user-actions/create-educational-institute/store', [EducationalInstituteController::class, 'store'])->name('create-educational-institute/store');
});

// using middleware to check if user has admin role for accessing users route
Route::middleware('role:admin')->get('/users', function () {
    // ...
});

//for tesing purposes, APIs specificallly
Route::get('/profiles/{user}', 'App\Http\Controllers\ProfilesController@index');


Route::get('/user-actions/create-educational-institute', [EducationalInstituteController::class, 'create'])->name('create-educational-institute');
Route::get('/user-actions/view-educational-institutes',[EducationalInstituteController::class, 'index'])->name('livewire.view-educational-institutes');
Route::get('/institutes/id={id}', 'App\Http\Controllers\EducationalInstituteController@show')->name('institutes.show');

