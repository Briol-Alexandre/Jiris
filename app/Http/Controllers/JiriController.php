<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Models\Jiri;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        return view('jiri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request): RedirectResponse
    {
        $jiri = Jiri::create($request->validated());

        return to_route('jiri.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        /*if (! Gate::allows('show-jiri', $jiri)) {
            abort(403);
        }*/
        return view('jiri.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri)
    {
        return view('jiri.edit', compact('jiri'));
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
        if (!Gate::allows('destroy-jiri', $jiri)) {
            abort(403);
        }
        $jiri->delete();
        return to_route('jiri.index');
    }
}
