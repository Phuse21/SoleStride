<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
// use App\Livewire\RegisterUser;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');


Route::get('/search', [SearchController::class, '_invoke']);
Route::get('/tags/{tag:name}', [TagController::class, '_invoke']);

Route::middleware('guest')->group(function () {
    // Route::get('/register', RegisterUser::class);
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');