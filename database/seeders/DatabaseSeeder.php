<?php

namespace Database\Seeders;

use App\Enums\ContactRole;
use App\Models\Attendance;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(6)
            ->has(
                Jiri::factory()
                    ->count(5)
                    ->hasAttached(
                    Project::factory()
                        ->count(30)
                        ->state(function (array $attributes, Jiri $jiri) {
                            return ['user_id' => $jiri->user->id];
                        })
                )
                    ->hasAttached(
                        Contact::factory()
                            ->count(10)
                            ->state(function (array $attributes, Jiri $jiri) {
                                return ['user_id' => $jiri->user->id];
                            }),
                        fn() => [
                            'role' => random_int(0, 1) ? ContactRole::Evaluator->value : ContactRole::Student->value
                        ]

                    )
            );

        $alexandre = User::factory()
            ->hasJiris(6)
            ->hasContacts(10)
            ->hasProjects(15)
            ->create(['email' => 'alexandre.briol@gmail.com']);

        $alexandre->jiris->each(function ($jiri) use ($alexandre) {
            $alexandre->contacts->random(10)->each(function ($contact) use ($jiri) {
                $jiri->contacts()->attach($contact, ['role' => random_int(0, 1) ? ContactRole::Evaluator->value : ContactRole::Student->value]);
            });
            $alexandre->projects->random(3)->each(function ($project) use ($jiri) {
                $jiri->projects()->attach($project);
            });
        });


        /*User::factory(10)
            ->hasJiris(10)
            ->hasContacts(10)
            ->hasProjects(10)
            ->create()
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $jiri->contacts()->attach(
                        $user->contacts->random(10),
                        [
                            'role' => random_int(0, 1) ? ContactRole::Evaluator->value : ContactRole::Student->value
                        ]
                    );
                });
            });

        User::factory()
            ->hasJiris(10)
            ->hasContacts(10)
            ->hasProjects(10)
            ->create(['name' => 'Alexandre Briol', 'email' => 'alexandre.briol@gmail.com'])
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $jiri->contacts()->attach(
                        $user->contacts->random(10),
                        [
                            'role' => random_int(0, 1) ? ContactRole::Evaluator->value : ContactRole::Student->value
                        ]
                    );
                });
            });*/
    }
}
