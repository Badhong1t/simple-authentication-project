<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;

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

Route::get('/public', [authController::class, 'publicMessage'])->name('public');
Route::get('/private', [authController::class, 'privateMessage'])->name('private')->middleware('auth');
Route::get('/userLogin', [authController::class, 'login'])->name('user.login');
Route::get('/logout', [authController::class, 'logout'])->name('logout');

Route::get('/task', [TaskController::class, 'index'])->name('tasks.index')->middleware('auth');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');
Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')->middleware('auth');

require __DIR__.'/auth.php';
