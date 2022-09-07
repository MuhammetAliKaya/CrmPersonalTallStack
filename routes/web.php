<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::redirect('/', '/login');
Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');

Route::post('/register/post', [App\Http\Controllers\UserOperations::class, 'createUserRequest'])->name('createUser');

Route::post('/login/post', [App\Http\Controllers\UserOperations::class, 'loginUserRequest'])->name('loginUser');


Route::middleware('auth', 'verify')->group(function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    Route::view('/kanban', 'pages.kanban')->name('kanban');
    Route::view('/customers', 'pages.customers')->name('customers');
    Route::get('profil/{user:name}',  [App\Http\Controllers\UserOperations::class, 'getProfil'])->name('profil');
    Route::get('/logout', [App\Http\Controllers\UserOperations::class, 'logout'])->name('logout');
});

Route::resource('customerOperations', CustomerController::class);


// Route::view('/try', 'components.verifyNotification');

Route::get('/email/verify', function () {
    if (auth()->user()->email_verified_at) {
        dd('here');
        return redirect('/dashboard');
    } else {
        return view('components.verifyNotification');
    }
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');