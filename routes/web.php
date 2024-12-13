<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DataController;

Route::get('/', [DataController::class, 'showForm']);
Route::post('/submit', [DataController::class, 'submitForm']);

Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form', [FormController::class, 'processForm']);

Route::get('/data/{id}', [DataController::class, 'showElement']);
Route::post('/data/{id}/edit', [DataController::class, 'editElement']);

Route::get('/data/trashed', [DataController::class, 'showTrashed']);
Route::patch('/data/{id}/restore', [DataController::class, 'restoreElement']);

Route::get('/data', [DataController::class, 'showData'])->name('data.index');
Route::get('/data/create', [DataController::class, 'showForm'])->name('form');
Route::post('/data', [DataController::class, 'store'])->name('data.store');
Route::get('/data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::put('/data/{id}', [DataController::class, 'update'])->name('data.update');
Route::delete('/data/{id}', [DataController::class, 'destroy'])->name('data.destroy');

Route::get('/data/trash', [DataController::class, 'trash'])->name('data.trash');
Route::put('/data/{id}/restore', [DataController::class, 'restore'])->name('data.restore');
Route::delete('/data/{id}/force-delete', [DataController::class, 'forceDelete'])->name('data.forceDelete');

