@extends('layout')

@section('title', 'Modifier un média')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight:bold; }
input, select, textarea {
    width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;
}
.submit-btn {
    background:#27ae60; color:white; padding:10px 20px;
    border-radius:6px; border:none;
}
</style>

<h1>Modifier un média</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('medias.update', $media->id_media) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Fichier actuel :</label><br>
        @if(preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->chemin))
            <img src="{{ asset($media->chemin) }}" width="100">
        @else
            <a href="{{ asset($media->chemin) }}" target="_blank">Voir le fichier</a>
        @endif
    </div>

    <div class="form-group">
        <label>Nouveau fichier (optionnel) :</label>
        <input type="file" name="chemin">
    </div>

    <div class="form-group">
        <label>Description :</label>
        <textarea name="description">{{ $media->description }}</textarea>
    </div>

    <div class="form-group">
        <label>Type de média :</label>
        <select name="id_type_media" required>
            @foreach($types as $type)
                <option value="{{ $type->id_type_media }}"
                    {{ $media->id_type_media == $type->id_type_media ? 'selected' : '' }}>
                    {{ $type->nom_media }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Contenu associé :</label>
        <select name="id_contenu" required>
            @foreach($contenus as $c)
                <option value="{{ $c->id_contenu }}"
                    {{ $media->id_contenu == $c->id_contenu ? 'selected' : '' }}>
                    {{ $c->titre }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="submit-btn">Mettre à jour</button>
</form>

@endsection
