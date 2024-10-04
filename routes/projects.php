<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function (){
    //Read
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])
        ->can('view', 'project')
        ->name('projects.show');


    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
        ->can('update', 'project')
        ->name('projects.edit');
    //Create/Update/Delete
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::patch('/projects/{project}', [ProjectController::class, 'update'])
        ->can('update', 'project')
        ->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
        ->can('delete', 'project')
        ->name('projects.destroy');
});




