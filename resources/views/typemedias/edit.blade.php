@extends('layout')

@section('title', 'Modifier type média')

@section('content')

<style>
.form-group { margin-bottom:15px; }
input { width:100%; padding:10px; border-radius:6px; border:1px solid #ccc; }
.btn-update { background:#f39c12; padding:10px 15px; color:white; border-radius:6px; }
</style>

<h1>Modifier le type média</h1>

<form action="{{ route('type_medias.update', $type_media->id_type_media) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Nom du média :</label>
        <input type="text" name="nom_media" value="{{ $type_media->nom_media }}" required>
    </div>

    <button class="btn-update">Mettre à jour</button>
</form>

@endsection
