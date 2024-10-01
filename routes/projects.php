<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.home');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});




