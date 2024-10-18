<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Project;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attendance::factory(1)->create();
    }
}
