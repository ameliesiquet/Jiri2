<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JiriController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JiriController::class, 'index'])->name('jiris.home');
Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');

Route::post('/jiris', [JiriController::class, 'store'])->name('jiris.store');
Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');

Route::get('/jiris/{jiri}', [JiriController::class, 'show'])->name('jiris.show');
Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])->name('jiris.edit');
Route::patch('/jiris/{jiri}', [JiriController::class, 'update'])->name('jiris.update');
Route::delete('/jiris/{jiri}', [JiriController::class, 'destroy'])->name('jiris.destroy');


Route::get('/projects', [ProjectController::class, 'index'])->name('projects.home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/contacts', [ContactController::class, 'index'])->name('contact.home');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');

Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');



