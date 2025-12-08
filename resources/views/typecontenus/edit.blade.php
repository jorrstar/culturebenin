@extends('layout')

@section('title', 'Modifier type contenu')

@section('content')

<style>
.form-group { margin-bottom:15px; }
input { width:100%; padding:10px; border-radius:6px; border:1px solid #ccc; }
.btn-update { background:#f39c12; padding:10px 15px; color:white; border-radius:6px; }
</style>

<h1>Modifier un type de contenu</h1>

<form action="{{ route('type_contenus.update', $type_contenu->id_type_contenu) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Nom du contenu :</label>
        <input type="text" name="nom_contenu" value="{{ $type_contenu->nom_contenu }}" required>
    </div>

    <button class="btn-update">Mettre à jour</button>
</form>

@endsection
