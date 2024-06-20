<?php

use App\Http\Controllers\Applicants\HomeController as ApplicantsHomeController;
use App\Http\Controllers\Employer\HomeController as EmployerHomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'employer',
    'as' => 'employer.',
    'middleware' => ['auth', 'employer']
], function () {
    Route::get('/', [EmployerHomeController::class, 'home'])->name('home');
    Route::get('/jobs/create', [JobController::class, 'create']);
});

Route::group([
    'prefix' => 'applicants',
    'as' => 'applicants.',
    'middleware' => 'auth'
], function () {
    Route::get('/', [ApplicantsHomeController::class, 'home'])->name('home');

});

Route::get('/search', [SearchController::class, '_invoke']);
Route::get('/tags/{tag:name}', [TagController::class, '_invoke']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');