@extends('layout')

@section('title', 'Modifier un rôle')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input {
    width: 100%; padding: 10px;
    border-radius: 6px; border: 1px solid #ccc;
}
.btn-update {
    background: #f39c12;
    color: white;
    padding: 10px 15px;
    border-radius: 6px;
    border: none;
}
</style>

<h1>Modifier le rôle</h1>

<form action="{{ route('roles.update', $role->id_role) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nom du rôle :</label>
        <input type="text" name="nom_role" value="{{ $role->nom_role }}" required>
    </div>

    <button class="btn-update">Mettre à jour</button>
</form>

@endsection
