@extends('layout')

@section('title', 'Ajouter un média')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight:bold; }
input, textarea, select {
    width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;
}
.submit-btn {
    background:#27ae60; color:white; padding:10px 20px;
    border-radius:6px; border:none;
}
</style>

<h1>Ajouter un média</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('medias.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Fichier du média :</label>
        <input type="file" name="chemin" required>
    </div>

    <div class="form-group">
        <label>Description :</label>
        <textarea name="description"></textarea>
    </div>

    <div class="form-group">
        <label>Type de média :</label>
        <select name="id_type_media" required>
            @foreach($types as $type)
                <option value="{{ $type->id_type_media }}">{{ $type->nom_media }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Contenu associé :</label>
        <select name="id_contenu" required>
            @foreach($contenus as $c)
                <option value="{{ $c->id_contenu }}">{{ $c->titre }}</option>
            @endforeach
        </select>
    </div>

    <button class="submit-btn">Enregistrer</button>
</form>


@endsection
