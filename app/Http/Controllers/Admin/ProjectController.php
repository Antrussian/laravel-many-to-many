<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology; // Aggiungi questo per utilizzare il modello Technology
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Mostra l'elenco dei progetti.
     * Pre-carica la relazione 'type' per ottimizzare le query.
     */
    public function index()
    {
        $projects = Project::with('type')->get(); // Ottimizza con il pre-caricamento della relazione 'type'
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Mostra il form per creare un nuovo progetto.
     * Passa tutte le tecnologie disponibili alla vista per permettere l'assegnazione.
     */
    public function create()
    {
        $technologies = \App\Models\Technology::all(); // Recupera tutte le tecnologie
        return view('admin.projects.create', compact('technologies'));
    }

    /**
     * Salva un nuovo progetto nel database.
     * Valida i dati della richiesta e associa le tecnologie selezionate.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'date' => 'required|date',
            'project_image' => 'required|url',
            'type_id' => 'required|exists:types,id', 
            'technologies' => 'sometimes|array' // Aggiungi la validazione per le tecnologie
        ]);

        $project = Project::create($validatedData); // Crea il progetto con i dati validati
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->input('technologies', [])); // Associa le tecnologie

        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Mostra i dettagli di un singolo progetto.
     */
    public function show(Project $project)
    {
        $project->load('type', 'technologies'); // Pre-carica le relazioni 'type' e 'technologies'
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Mostra il form per modificare un progetto esistente.
     * Passa il progetto e tutte le tecnologie disponibili alla vista.
     */
    public function edit(Project $project)
    {
        $technologies = \App\Models\Technology::all(); // Recupera tutte le tecnologie
        $project->load('technologies'); // Pre-carica le tecnologie associate al progetto
        return view('admin.projects.edit', compact('project', 'technologies'));
    }

    /**
     * Aggiorna un progetto esistente nel database.
     * Valida i dati della richiesta e aggiorna le associazioni delle tecnologie.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'date' => 'required|date',
            'project_image' => 'required|url',
            'type_id' => 'required|exists:types,id', 
            'technologies' => 'sometimes|array'
        ]);

        $project->update($validatedData);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->input('technologies', [])); // Aggiorna le associazioni delle tecnologie
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Elimina un progetto dal database.
     */
    public function destroy(Project $project)
    {
        $project->delete(); // Elimina il progetto
        return redirect()->route('admin.projects.index');
    }
}
