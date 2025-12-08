@extends('layout')

@section('title', 'Types de médias')

@section('content')

<style>
.table { width:100%; border-collapse:collapse; margin-top:15px; }
.table th { background:#2c3e50; color:white; padding:10px; }
.table td { padding:10px; border-bottom:1px solid #ddd; }
tr:hover { background:#f4f4f4; }
.btn { padding:6px 12px; border-radius:6px; text-decoration:none; color:white; }
.btn-primary { background:#3498db; }
.btn-warning { background:#f39c12; }
.btn-danger { background:#e74c3c; }
</style>

<h1>Types de médias</h1>

<a href="{{ route('typemedias.create') }}" class="btn btn-primary">Ajouter</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom du média</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($types as $t)
        <tr>
            <td>{{ $t->id_type_media }}</td>
            <td>{{ $t->nom_media }}</td>
            <td>
                <a href="{{ route('typemedias.show', $t->id_type_media) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('typemedias.edit', $t->id_type_media) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('typemedias.destroy', $t->id_type_media) }}"
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
