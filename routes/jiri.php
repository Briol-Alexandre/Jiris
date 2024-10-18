<?php
// JIRI ROUTES

use App\Http\Controllers\JiriController;

/*Route::get('/', [JiriController::class, 'index'])
    ->name('jiri.home');*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jiris', [JiriController::class, 'index'])
        ->name('jiri.index');

    Route::get('/jiris/create', [JiriController::class, 'create'])
        ->name('jiri.create');

    Route::post('/jiris', [JiriController::class, 'store'])
        ->name('jiri.store');

    Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])
        ->can('update', 'jiri')
        ->name('jiri.edit');

    Route::patch('/jiris/{jiri}/edit', [JiriController::class, 'update'])
        ->can('update', 'jiri')
        ->name('jiri.update');

    Route::delete('/jiris/{jiri}', [JiriController::class, 'destroy'])
        ->can('delete', 'jiri')
        ->name('jiri.destroy');

    Route::get('/jiris/{jiri}', [JiriController::class, 'show'])
        ->can('view', 'jiri')
        ->name('jiri.show');
});
