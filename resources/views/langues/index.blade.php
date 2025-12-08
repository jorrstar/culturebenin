@extends('layout')

@section('title', 'Liste des langues')

@section('content')

<!-- Font Awesome officiel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
.table th {
    background: #3498db;
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

/* Boutons icônes */
.icon-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    color: white;
    text-decoration: none;
    font-size: 18px;
}

.btn-add { background: #3498db; }
.btn-edit { background: #f39c12; }
.btn-delete { background: #e74c3c; }

.icon-btn:hover {
    opacity: 0.85;
}
</style>

<h1>Langues disponibles</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Bouton Ajouter -->
<a href="{{ route('langues.create') }}" class="icon-btn btn-add">
    <i class="fa-solid fa-plus"></i>
</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom de la langue</th>
            <th>Code</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($langues as $langue)
            <tr>
                <td>{{ $langue->id_langue }}</td>
                <td>{{ $langue->nom_langue }}</td>
                <td>{{ $langue->code_langue }}</td>
                <td>{{ $langue->description }}</td>

                <td>

                    <!-- Modifier -->
                    <a href="{{ route('langues.edit', $langue->id_langue) }}" 
                       class="icon-btn btn-edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <!-- Supprimer -->
                    <form action="{{ route('langues.destroy', $langue->id_langue) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="icon-btn btn-delete"
                                onclick="return confirm('Supprimer cette langue ?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
