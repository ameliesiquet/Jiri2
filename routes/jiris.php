<?php

use App\Http\Controllers\JiriController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/', [JiriController::class, 'index'])->name('jiris.home');

    Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');

    Route::post('/jiris', [JiriController::class, 'store'])->name('jiris.store');
    Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');

    Route::get('/jiris/{jiri}', [JiriController::class, 'show'])->name('jiris.show');
    Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])->name('jiris.edit');
    Route::patch('/jiris/{jiri}', [JiriController::class, 'update'])->name('jiris.update');
    Route::delete('/jiris/{jiri}', [JiriController::class, 'destroy'])->name('jiris.destroy');
});

