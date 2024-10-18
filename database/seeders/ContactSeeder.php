<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory(1)
            ->hasAttendance(Attendance::factory()->count(5), 'attendances')
            ->create();
    }
}
