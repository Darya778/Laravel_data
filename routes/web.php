<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form', [FormController::class, 'processForm']);

Route::get('/data', [DataController::class, 'showData']);
