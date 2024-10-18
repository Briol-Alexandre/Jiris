<?php
// JIRI ROUTES

use App\Http\Controllers\AttendanceController;

/*Route::get('/', [AttendanceController::class, 'index'])
    ->name('attendance.home');*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::patch('/assigment/{assignment}', [AssignmentController::class, 'update'])
        ->can('update', 'attendance')
        ->name('assigment.update');
});
