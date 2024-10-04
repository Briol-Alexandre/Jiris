<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Authorisation avec des gates
        /*
        Gate::define('update-jiri', function (User $user, Jiri $jiri){
            return $user->id === $jiri->user_id;
        });

        Gate::define('show-jiri', function (User $user, Jiri $jiri){
            return $user->id === $jiri->user_id;
        });

        Gate::define('destroy-jiri', function (User $user, Jiri $jiri){
            return $user->id === $jiri->user_id;
        });




        Gate::define('update-contact', function (User $user, Contact $contact){
            return $user->id === $contact->user_id;
        });

        Gate::define('show-contact', function (User $user, Contact $contact){
            return $user->id === $contact->user_id;
        });

        Gate::define('destroy-contact', function (User $user, Contact $contact){
            return $user->id === $contact->user_id;
        });



        Gate::define('update-project', function (User $user, Project $project){
            return $user->id === $project->user_id;
        });

        Gate::define('show-project', function (User $user, Project $project){
            return $user->id === $project->user_id;
        });

        Gate::define('destroy-project', function (User $user, Project $project){
            return $user->id === $project->user_id;
        });*/

    }
}
