<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function (){
    //Read
    //Route::get('/', [JiriController::class, 'index'])->name('jiris.home');
    /*Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');
    Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');
    Route::get('/jiris/{jiri}', [JiriController::class, 'show'])
        ->can('view', 'jiri')
        ->name('jiris.show');

    Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])
        ->can('update', 'jiri')
        ->name('jiris.edit');*/

    //Create / Update / Delete
    //Route::post('/jiris', [JiriController::class, 'store'])->name('jiris.store');

    Route::patch('/attendances/{attendance}', [AttendanceController::class, 'update'])
        //->can('update', 'attendance')
        ->name('attendances.update');

   Route::delete('/attendances/{attendance}', [AttendanceController::class, 'destroy'])
        //->can('delete', 'jiri')
        ->name('attendances.destroy');
});

