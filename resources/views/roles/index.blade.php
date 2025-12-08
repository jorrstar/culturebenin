@extends('layout')

@section('title', 'Liste des rôles')

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
    background: #f0f0f0;
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

<h1>Gestion des rôles</h1>

<a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un rôle</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom du rôle</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id_role }}</td>
                <td>{{ $role->nom_role }}</td>

                <td>
                    <a href="{{ route('roles.show', $role->id_role) }}" class="btn btn-primary">Voir</a>

                    <a href="{{ route('roles.edit', $role->id_role) }}" class="btn btn-warning">Modifier</a>

                    <form action="{{ route('roles.destroy', $role->id_role) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"
                                onclick="return confirm('Supprimer ce rôle ?')">
                            Supprimer
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection
