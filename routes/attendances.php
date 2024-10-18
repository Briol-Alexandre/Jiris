<?php
// JIRI ROUTES

use App\Http\Controllers\AttendanceController;

/*Route::get('/', [AttendanceController::class, 'index'])
    ->name('attendance.home');*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::patch('/attendances/{attendance}', [AttendanceController::class, 'update'])
        ->can('update', 'attendance')
        ->name('attendances.update');
});
