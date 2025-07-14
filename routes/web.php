<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');
Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store');
Route::delete('/tasks/{task}',[TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/tasks/{task}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{task}',[TaskController::class, 'update'])->name('tasks.update');