@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Titolo della pagina -->
    <h2 class="mb-4" style="color: white;">Crea Nuovo Progetto</h2>

    <!-- Visualizzazione degli errori di validazione -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form per la creazione di un nuovo progetto -->
    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf <!-- Token CSRF per la sicurezza del form -->
        
        <!-- Campo per il titolo del progetto -->
        <div class="mb-3">
            <label for="title" class="form-label" style="color: white;">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci il titolo del progetto" required>
        </div>
        
        <!-- Campo per la descrizione del progetto -->
        <div class="mb-3">
            <label for="description" class="form-label" style="color: white;">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrivi il progetto" required>{{ old('description') }}</textarea>
        </div>
        
        <!-- Campo per il nome del collaboratore del progetto -->
        <div class="mb-3">
            <label for="author" class="form-label" style="color: white;">Collaboratore</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" placeholder="Nome del collaboratore" required>
        </div>
        
        <!-- Campo per la data del progetto -->
        <div class="mb-3">
            <label for="date" class="form-label" style="color: white;">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>
        
        <!-- Campo per l'URL dell'immagine del progetto -->
        <div class="mb-3">
            <label for="project_image" class="form-label" style="color: white;">URL Immagine del Progetto</label>
            <input type="url" class="form-control" id="project_image" name="project_image" value="{{ old('project_image') }}" placeholder="https://esempio.com/immagine.jpg" required>
        </div>
        
        <!-- Dropdown per selezionare la tipologia del progetto -->
        <div class="mb-3">
            <label for="type_id" class="form-label" style="color: white;">Tipologia</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <option value="">Seleziona una Tipologia</option>
                @foreach(\App\Models\Type::all() as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Checkbox per selezionare le tecnologie associate al progetto -->
        <div class="mb-3" style="color: white;">
            <label class="form-label">Tecnologie</label><br>
            @foreach(\App\Models\Technology::all() as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="tech_{{ $technology->id }}" value="{{ $technology->id }}">
                    <label class="form-check-label" for="tech_{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>
        
        <!-- Bottone di submit per creare il progetto -->
        <button type="submit" class="btn btn-primary">Crea Progetto</button>
    </form>
</div>
@endsection
