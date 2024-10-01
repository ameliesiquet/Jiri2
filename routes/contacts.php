<?php


use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


//Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.home');
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::patch('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

