<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\JiriController::class, 'index'])
    ->name('jiri.home');

Route::get('/jiris', [\App\Http\Controllers\JiriController::class, 'index'])
    ->name('jiri.index');

Route::get('/jiris/create', [\App\Http\Controllers\JiriController::class, 'create'])
    ->name('jiri.create');

Route::post('/jiris', [\App\Http\Controllers\JiriController::class, 'store'])
    ->name('jiri.store');

Route::get('/jiris/{jiri}', [\App\Http\Controllers\JiriController::class, 'show'])
    ->name('jiri.show');




Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index'])
    ->name('project.index');

Route::get('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'show'])
    ->name('project.show');



Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])
    ->name('contact.index');

Route::get('/contacts/{id}', [\App\Http\Controllers\ContactController::class, 'show'])
    ->name('contact.show');

