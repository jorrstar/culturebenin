@extends('layout')

@section('title', 'Créer un type média')

@section('content')

<style>
.form-group { margin-bottom:15px; }
input {
    width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;
}
.btn-save { background:#27ae60; padding:10px 15px; color:white; border-radius:6px; }
</style>

<h1>Créer un type de média</h1>

<form action="{{ route('type_medias.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nom du média :</label>
        <input type="text" name="nom_media" required>
    </div>

    <button class="btn-save">Enregistrer</button>
</form>

@endsection
