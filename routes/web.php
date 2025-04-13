<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->prefix('dashboard')->group(function () {
    // ROUTE USERS
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::get('/', 'index')->name('user.index');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/', 'store')->name('user.store');
        Route::get('/{id}/show', 'show')->name('user.show');
        Route::get('/{id}/edit', 'edit')->name('user.edit');
        Route::patch('/{id}', 'update')->name('user.update');
        Route::delete('/{id}', 'delete')->name('user.delete');
    });


});


require __DIR__.'/auth.php';
