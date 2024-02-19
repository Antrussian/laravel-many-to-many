<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Precarica la relazione 'type' con ogni 'project'
        $projects = Project::with('type')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'date' => 'required|date',
            'project_image' => 'required|url',
            'type_id' => 'required|exists:types,id', // Assicura che type_id esista nella tabella 'types'
        ]);

        Project::create($validatedData);
        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        // Precarica la relazione 'type' quando visualizzi un singolo 'project'
        $project->load('type');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'date' => 'required|date',
            'project_image' => 'required|url',
            'type_id' => 'required|exists:types,id', // Aggiungi la validazione per 'type_id'
        ]);

        $project->update($validatedData);
        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
