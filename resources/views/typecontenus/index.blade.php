@extends('layout')

@section('title', 'Types de contenus')

@section('content')

<style>
.table { width:100%; border-collapse:collapse; margin-top:15px; }
.table th { background:#2c3e50; color:white; padding:10px; }
.table td { padding:10px; border-bottom:1px solid #ddd; }
.btn { padding:6px 12px; border-radius:6px; color:white; text-decoration:none; }
.btn-primary { background:#3498db; }
.btn-warning { background:#f39c12; }
.btn-danger { background:#e74c3c; }
</style>

<h1>Types de contenus</h1>

<a href="{{ route('typecontenus.create') }}" class="btn btn-primary">Ajouter</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($types as $t)
        <tr>
            <td>{{ $t->id_type_contenu }}</td>
            <td>{{ $t->nom_contenu }}</td>
            <td>
                <a href="{{ route('typecontenus.show', $t->id_type_contenu) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('typecontenus.edit', $t->id_type_contenu) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('typecontenus.destroy', $t->id_type_contenu) }}"
                      method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
