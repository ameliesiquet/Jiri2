<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function (){
    //Read
    //Route::get('/', [JiriController::class, 'index'])->name('jiris.home');
    /*Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');
    Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');
     */

    Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])
        //->can('view', 'assignment')
        ->name('assignments.show');


    Route::get('/assignments/{assignment}/edit', [AssignmentController::class, 'edit'])
        //->can('update', 'assignment')
        ->name('assignments.edit');

    //Create / Update / Delete
    Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');

    Route::patch('/assignments/{assignment}', [AssignmentController::class, 'update'])
        //->can('update', 'attendance')
        ->name('assignments.update');

    Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])
        //->can('delete', 'jiri')
        ->name('assignments.destroy');
});

