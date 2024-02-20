@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Titolo della pagina per la modifica del progetto -->
    <h2 class="text-white mb-4">Modifica Progetto</h2>

    <!-- Blocco per la visualizzazione degli errori di validazione -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> <!-- Elenco degli errori di validazione -->
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form per la modifica di un progetto esistente -->
    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
        @csrf <!-- Token CSRF per la sicurezza del form -->
        @method('PUT') <!-- Specifica del metodo HTTP PUT per l'aggiornamento della risorsa -->

        <!-- Campo input per il titolo del progetto -->
        <div class="mb-3">
            <label for="title" class="form-label" style="color: white;">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <!-- Area di testo per la descrizione del progetto -->
        <div class="mb-3">
            <label for="description" class="form-label" style="color: white;">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <!-- Campo input per il nome del collaboratore del progetto -->
        <div class="mb-3">
            <label for="author" class="form-label" style="color: white;">Collaboratore</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $project->author) }}" required>
        </div>

        <!-- Campo input per la data del progetto -->
        <div class="mb-3">
            <label for="date" class="form-label" style="color: white;">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $project->date) }}" required>
        </div>

        <!-- Campo input per l'URL dell'immagine del progetto -->
        <div class="mb-3">
            <label for="project_image" class="form-label" style="color: white;">URL Immagine del Progetto</label>
            <input type="url" class="form-control" id="project_image" name="project_image" value="{{ old('project_image', $project->project_image) }}" required>
        </div>

        <!-- Dropdown per la selezione della tipologia del progetto -->
        <div class="mb-3">
            <label for="type_id" class="form-label" style="color: white;">Tipologia</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <option value="">Seleziona una Tipologia</option>
                @foreach(\App\Models\Type::all() as $type)
                    <option value="{{ $type->id }}" {{ (old('type_id', $project->type_id) == $type->id) ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Checkbox per la selezione delle tecnologie associate al progetto -->
        <div class="mb-3" style="color: white;">
            <label class="form-label">Tecnologie</label><br>
            @foreach(\App\Models\Technology::all() as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="tech_{{ $technology->id }}" value="{{ $technology->id }}"
                    {{ in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tech_{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>

        <!-- Bottone di submit per applicare le modifiche al progetto -->
        <button type="submit" class="btn btn-primary">Aggiorna Progetto</button>
    </form>
</div>
@endsection
