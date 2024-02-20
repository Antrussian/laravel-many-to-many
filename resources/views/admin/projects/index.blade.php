@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Titolo della sezione -->
            <h2 class="text-white mb-3">
                Questi sono tutti i progetti disponibili {{ Auth::user()->name }}
            </h2>

            <!-- Bottone per aggiungere un nuovo progetto -->
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">Aggiungi Nuovo Progetto</a>

            <!-- Tabella che elenca i progetti -->
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Data</th>
                        <th>Collaboratore</th>
                        <th>Anteprima</th>
                        <th>Tipologia</th>
                        <th>Tecnologia</th> <!-- Colonna per visualizzare le tecnologie associate -->
                        <th>Opzioni</th> <!-- Colonna per le azioni su ogni progetto -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Ciclo sui progetti per popolare la tabella -->
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
                        <td>{{ $project->type->name ?? 'N/A' }}</td>
                        <td>
                            <!-- Visualizzazione delle tecnologie come badge; testo in nero -->
                            @forelse($project->technologies as $technology)
                                <span class="badge badge-secondary" style="color: black;">{{ $technology->name }}</span>
                            @empty
                                Nessuna tecnologia associata.
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <!-- Bottone per visualizzare i dettagli del progetto -->
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary mb-2">Visualizza</a>
                                <!-- Bottone per modificare il progetto -->
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning mb-2">Modifica</a>
                                <!-- Form per eliminare il progetto -->
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
