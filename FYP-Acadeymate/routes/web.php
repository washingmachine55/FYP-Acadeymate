<?php

use Illuminate\Support\Facades\Route;

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

// Routes for new registeration
Route::get('/register/new-educational-institute-admin', function () {
    return view('auth/register/new-educational-institute-admin');
})->name('register.new-educational-institute-admin');



Route::get('/profiles/{user}', 'App\Http\Controllers\ProfilesController@index');
