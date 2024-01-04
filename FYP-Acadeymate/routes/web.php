<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;
use App\Livewire\CreateCourse;
use App\Livewire\CreateEducationalInstitute;
use App\Models\EducationalInstitute;
use GuzzleHttp\Promise\Create;

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
});


// Provide routes to permissions
Route::middleware('create-educational-institutes')->group(function () {
    Route::get(
        '/users/create',
        [\App\Http\Controllers\UserController::class, 'create']
    );

    Route::post(
        '/users',
        [\App\Http\Controllers\UserController::class, 'store']
    );
});

// using middleware to check if user has admin role for accessing users route
Route::middleware('role:admin')->get('/users', function () {
    // ...
});

// Routes for new registeration
Route::get('/register/new-educational-institute-admin', function () {
    return view('auth/register/new-educational-institute-admin');
})->name('register.new-educational-institute-admin');

//for tesing purposes, APIs specificallly
Route::get('/profiles/{user}', 'App\Http\Controllers\ProfilesController@index');

// Assigning Resource
Route::resource('EducationalInstitute', App\Http\Controllers\EducationalInstituteController::class);

// Mass Routes assignment
Route::get('user-actions/create-course', CreateCourse::class)->name('create-course');
Route::get('user-actions/create-educational-institute', App\Http\Controllers\EducationalInstituteController::class, 'index')->name('create-educational-institute');
Route::get('user-actions/create-intake',)->name('create-intake');


Route::middleware('auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
	)->group(function () {
		// Route::post(
		// 	'user-actions/create-educational-institute/{id}', [App\Http\Controllers\EducationalInstituteController::class] ($id) {
		// 		return dd('Educational Institute Created Successfully')
		// 	})->name(create-educational-institute/create);

		// Route::post(
		// 	'user-actions/create-educational-institute/{id}',
		// 	[\App\Http\Controllers\EducationalInstituteController::class, 'store($request)']
		// )->name('create-educational-institute/create/');
		// Route::put('user-actions/create-educational-institute/{id}', function ($id) {

		// });

		// Route::post('user-actions/create-educational-institute/{id}', 'EducationalInstituteController@store');
});
