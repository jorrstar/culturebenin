@extends('layout')

@section('title', 'Liste des régions')

@section('content')

<style>
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
.table th {
    background: #2c3e50;
    color: white;
    padding: 10px;
}
.table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}
.table tr:hover {
    background: #f7f7f7;
}
.btn {
    padding: 6px 12px;
    border-radius: 6px;
    color: white;
    text-decoration: none;
}
.btn-primary { background: #3498db; }
.btn-warning { background: #f39c12; }
.btn-danger { background: #e74c3c; }
</style>

<h1>Gestion des régions</h1>

<a href="{{ route('regions.create') }}" class="btn btn-primary">Ajouter une région</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom de la région</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($regions as $region)
            <tr>
                <td>{{ $region->id_region }}</td>
                <td>{{ $region->nom_region }}</td>
                <td>{{ $region->description_region }}</td>

                <td>
                    <a href="{{ route('regions.show', $region->id_region) }}" class="btn btn-primary">Voir</a>

                    <a href="{{ route('regions.edit', $region->id_region) }}" class="btn btn-warning">Modifier</a>

                    <form action="{{ route('regions.destroy', $region->id_region) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"
                                onclick="return confirm('Supprimer cette région ?')">
                            Supprimer
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection
