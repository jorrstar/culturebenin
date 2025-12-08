@extends('layout')

@section('title', 'Liste des utilisateurs')

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
    background: #f5f5f5;
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

<h1>Gestion des utilisateurs</h1>
<div style="text-align: right; margin-bottom: 15px;">
    <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">
        Ajouter un utilisateur
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Rôle</th>
            <th>Langue</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($utilisateurs as $u)
            <tr>
                <td>{{ $u->id_utilisateur }}</td>
                <td>{{ $u->nom }} {{ $u->prenom }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->statut }}</td>
                <td>{{ $u->role->nom_role ?? '-' }}</td>
                <td>{{ $u->langue->nom_langue ?? '-' }}</td>

                <td>
                    <a href="{{ route('utilisateurs.show', $u->id_utilisateur) }}" class="btn btn-primary">Voir</a>

                    <a href="{{ route('utilisateurs.edit', $u->id_utilisateur) }}" class="btn btn-warning">Modifier</a>

                    <form action="{{ route('utilisateurs.destroy', $u->id_utilisateur) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" onclick="return confirm('Supprimer cet utilisateur ?')">
                            Supprimer
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection
