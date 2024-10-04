<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user()->projects()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        $project = Project::create($request->validated());

        return to_route('project.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        /*if (!Gate::allows('show-project', $project)) {
            abort(403);
        }*/
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectStoreRequest $request, Project $project)
    {
        /*if (!Gate::allows('update-contact', $project)) {
            abort(403);
        }*/
        $project->update($request->validated());
        return to_route('project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        /*if (!Gate::allows('destroy-project', $project)) {
            abort(403);
        }*/
        $project->delete();
        return to_route('project.index');
    }
}
