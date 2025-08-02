<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return auth()->check() 
    ? redirect('/tasks') 
    : redirect('/login');
});


// CRUD ROUTES
Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');
Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store');
Route::delete('/tasks/{task}',[TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/tasks/{task}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{task}',[TaskController::class, 'update'])->name('tasks.update');



// AUTH ROUTES

Route::get('/dashboard', function () {
    return redirect('/tasks');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
