@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Crea Nuovo Progetto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci il titolo del progetto" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrivi il progetto" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Collaboratore</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" placeholder="Nome del collaboratore" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>
        <div class="mb-3">
            <label for="project_image" class="form-label">URL Immagine del Progetto</label>
            <input type="url" class="form-control" id="project_image" name="project_image" value="{{ old('project_image') }}" placeholder="https://esempio.com/immagine.jpg" required>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <option value="">Seleziona una Tipologia</option>
                @foreach(\App\Models\Type::all() as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Crea Progetto</button>
    </form>
</div>
@endsection
