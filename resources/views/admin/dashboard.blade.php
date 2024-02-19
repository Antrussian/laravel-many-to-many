@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white mb-3">
                Questi sono tutti i progetti disponibili {{ Auth::user()->name }}
            </h2>

            <!-- Pulsante Aggiungi Nuovo Progetto -->
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">Aggiungi Nuovo Progetto</a>

            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Data</th>
                        <th>Collaboratore</th>
                        <th>Anteprima</th>
                        <th>Opzioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->date }}</td>
                        <td>{{ $project->author }}</td>
                        <td>
                            <img src="{{ $project->project_image }}" alt="Anteprima del progetto" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary mb-2">Visualizza</a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning mb-2">Modifica</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
