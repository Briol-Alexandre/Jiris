<?php

namespace App\Http\Controllers;

use App\Enums\ContactRole;
use App\Http\Requests\JiriStoreRequest;
use App\Models\Jiri;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $upcomingJiris = Auth::user()?->upcomingJiris()
            ->get();
        $pastJiris = Auth::user()?->pastJiris()
            ->get();

        return view('jiri.index', compact('upcomingJiris', 'pastJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Auth::user()?->contacts()->get();
        $projects = Auth::user()?->projects()->get();
        return view('jiri.create', compact('contacts', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request): RedirectResponse
    {
        $jiri = Auth::user()?->jiris()->create($request->validated());

        $collection = $request->collect();
        $students = $collection->filter(function ($value, $key) {
            if ($value === ContactRole::Student->value) {
                return $key;
            }
        });

        $evaluators = $collection->filter(function ($value, $key) {
            if ($value === ContactRole::Evaluator->value) {
                return $key;
            }
        });



        $jiri->students()->attach(array_keys($students->toArray()));
        $jiri->evaluators()->attach(array_keys($evaluators->toArray()));
        $jiri->projects()->attach($request->projects);

        return to_route('jiri.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        $jiri->load('students', 'evaluators');
        return view('jiri.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri)
    {
        $contacts = Auth::user()?->contacts()->get();
        $projects = Auth::user()?->projects()->get();
        $students = $jiri->students()->get();
        $evaluators = $jiri->evaluators()->get();
        $unaffectedContacts = $contacts->diff($students->merge($evaluators));

        return view('jiri.edit', compact('jiri', 'projects', 'students', 'evaluators', 'unaffectedContacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JiriStoreRequest $request, Jiri $jiri)
    {
        /*if (! Gate::allows('update-jiri', $jiri)) {
            abort(403);
        }*/

        $jiri->update($request->validated());
        return to_route('jiri.show', $jiri);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jiri $jiri)
    {
        $jiri->delete();
        return to_route('jiri.index');
    }
}
