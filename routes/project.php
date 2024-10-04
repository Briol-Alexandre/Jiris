<?php
// PROJECTS ROUTES

use App\Http\Controllers\ProjectController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('project.index');

    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('project.create');

    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
        ->name('project.edit');

    Route::patch('/projects/{project}/edit', [ProjectController::class, 'update'])
        ->name('project.update');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
        ->name('project.destroy');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])
        ->name('project.show');

    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('project.store');
});
