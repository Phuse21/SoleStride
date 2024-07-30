<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;


Route::get('/', [JobController::class, 'index']);


Route::get('/job-details/{job}', [JobController::class, 'show'])->name('job.details');


Route::group([
    'prefix' => 'employer',
    'middleware' => ['auth', 'employer']
], function () {
    Route::get('/home', [EmployerController::class, 'index'])->name('employer.home');
    Route::get('/create', [JobController::class, 'create'])->name('employer.create');
    Route::get('/jobs-posted', [EmployerController::class, 'jobsPosted'])->name('employer.jobsPosted');
    Route::get('/job-edit/{job}', [JobController::class, 'edit'])->name('employer.jobsEdit');
    Route::get('/jobs-market', [JobController::class, 'index'])->name('employer.jobsMarket');
    Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.profile');
});



Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/home', [ApplicantController::class, 'index'])->name('home');
    Route::get('/profile', [ApplicantController::class, 'profile'])->name('applicant.profile');
    Route::get('/applications', [ApplicantController::class, 'applications'])->name('applications');

});



Route::get('/search', [SearchController::class, '_invoke']);
Route::get('/tags/{tag:name}', [TagController::class, '_invoke']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::get('/reset-password/{token}', [SessionController::class, 'resetPassword'])->name('password.reset');
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');