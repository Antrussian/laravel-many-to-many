@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="text-white mb-4">Modifica Progetto</h2>

    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Collaboratore</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $project->author) }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $project->date) }}" required>
        </div>

        <div class="mb-3">
            <label for="project_image" class="form-label">URL Immagine del Progetto</label>
            <input type="url" class="form-control" id="project_image" name="project_image" value="{{ old('project_image', $project->project_image) }}" required>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <option value="">Seleziona una Tipologia</option>
                @foreach(\App\Models\Type::all() as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Aggiorna Progetto</button>
    </form>
</div>
@endsection
