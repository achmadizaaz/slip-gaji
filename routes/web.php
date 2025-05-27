<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
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
    Route::get('session/per-page', SessionController::class)->name('session.per-page');

    // ROUTE USERS
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::get('/', 'index')->name('user.index');
        Route::get('/add', 'create')->name('user.create');
        Route::post('/add', 'store')->name('user.store');
        Route::get('/{slug}', 'show')->name('user.show');
        Route::get('/{slug}/edit', 'edit')->name('user.edit');
        Route::put('/{id}', 'update')->name('user.update');
        Route::delete('/{id}', 'delete')->name('user.delete');
        Route::put('/{id}/change-password', 'changePassword')->name('user.change.password');
        Route::get('/download/template-import', 'downloadTemplateImport')->name('user.download.template.import');
        Route::put('/import', 'importUsers')->name('user.import');
    });


});


require __DIR__.'/auth.php';
