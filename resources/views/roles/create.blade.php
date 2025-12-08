@extends('layout')

@section('title', 'Créer un rôle')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input {
    width: 100%; padding: 10px;
    border-radius: 6px; border: 1px solid #ccc;
}
.btn-save {
    background: #27ae60;
    color: white;
    padding: 10px 15px;
    border-radius: 6px;
    border: none;
}
</style>

<h1>Ajouter un rôle</h1>

<form action="{{ route('roles.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nom du rôle :</label>
        <input type="text" name="nom_role" required>
    </div>

    <button class="btn-save">Enregistrer</button>
</form>

@endsection
