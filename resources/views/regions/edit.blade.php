@extends('layout')

@section('title', 'Modifier une région')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input, textarea {
    width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;
}
.btn-update {
    background: #f39c12;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 6px;
}
</style>

<h1>Modifier la région</h1>

<form action="{{ route('regions.update', $region->id_region) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nom de la région :</label>
        <input type="text" name="nom_region" value="{{ $region->nom_region }}" required>
    </div>

    <div class="form-group">
        <label>Description :</label>
        <textarea name="description_region" rows="4">{{ $region->description_region }}</textarea>
    </div>

    <button class="btn-update">Mettre à jour</button>
</form>

@endsection
