@extends('layout')

@section('title', 'Créer une région')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input, textarea {
    width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;
}
.btn-save {
    background: #27ae60;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 6px;
}
</style>

<h1>Ajouter une région</h1>

<form action="{{ route('regions.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nom de la région :</label>
        <input type="text" name="nom_region" required>
    </div>

    <div class="form-group">
        <label>Description :</label>
        <textarea name="description_region" rows="4"></textarea>
    </div>

    <button class="btn-save">Enregistrer</button>
</form>

@endsection
