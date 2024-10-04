<?php


use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


//Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.home');
Route::middleware(['auth', 'verified'])->group(function (){
    //Read
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])
        ->can('view', 'contact')
        ->name('contacts.show');

    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])
        ->can('update', 'contact')
        ->name('contacts.edit');

    Route::post('/contacts', [ContactController::class, 'store'])
        ->can('update', 'contact')
        ->name('contacts.store');
    Route::patch('/contacts/{contact}', [ContactController::class, 'update'])
        ->can('update', 'contact')
        ->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])
        ->can('delete', 'contact')
        ->name('contacts.destroy');
});

