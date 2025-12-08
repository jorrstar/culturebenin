@extends('layout')

@section('title', 'Modifier le contenu')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input, textarea, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.submit-btn {
    background: #f39c12;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
}
</style>

<h1>Modifier : {{ $contenu->titre }}</h1>

<form action="{{ route('contenus.update', $contenu->id_contenu) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Titre :</label>
        <input type="text" name="titre" value="{{ $contenu->titre }}" required>
    </div>

    <div class="form-group">
        <label>Texte :</label>
        <textarea name="texte" rows="4">{{ $contenu->texte }}</textarea>
    </div>

    <div class="form-group">
        <label>Statut :</label>
        <select name="statut">
            <option value="valide" @if($contenu->statut=='valide') selected @endif>Validé</option>
            <option value="attente" @if($contenu->statut=='attente') selected @endif>En attente</option>
        </select>
    </div>

    <div class="form-group">
        <label>Langue :</label>
        <select name="id_langue">
            @foreach($langues as $langue)
                <option value="{{ $langue->id_langue }}" @if($contenu->id_langue==$langue->id_langue) selected @endif>
                    {{ $langue->nom_langue }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Région :</label>
        <select name="id_region">
            @foreach($regions as $region)
                <option value="{{ $region->id_region }}" @if($contenu->id_region==$region->id_region) selected @endif>
                    {{ $region->nom_region }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Type de contenu :</label>
        <select name="id_typecontenu">
            @foreach($types as $type)
                <option value="{{ $type->id_typecontenu }}" @if($contenu->id_typecontenu==$type->id_typecontenu) selected @endif>
                    {{ $type->nom_contenu }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Auteur :</label>
        <select name="id_auteur">
            @foreach($utilisateurs as $u)
                <option value="{{ $u->id_utilisateur }}" @if($contenu->id_auteur==$u->id_utilisateur) selected @endif>
                    {{ $u->nom }} {{ $u->prenom }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="submit-btn">Mettre à jour</button>

</form>

@endsection
