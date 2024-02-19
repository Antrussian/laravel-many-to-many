@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white mb-3">Dettagli del Progetto</h2>

            <div class="card">
                <div class="card-header">
                    Progetto #{{ $project->id }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text">Data: {{ $project->date }}</p>
                    <p class="card-text">Collaboratore: {{ $project->author }}</p>
                    <img src="{{ $project->project_image }}" alt="Anteprima del progetto" style="width: 100%; max-width: 400px; height: auto;">
                    <p class="card-text">Tipologia: {{ $project->type->name ?? 'Nessuna tipologia associata' }}</p>

                    <div class="mt-3">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Torna all'elenco dei progetti</a>
        </div>
    </div>
</div>

@endsection
