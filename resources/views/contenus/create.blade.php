@extends('layout')

@section('title', 'Créer un contenu')

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
    background: #27ae60;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
}
.error-msg { color: red; margin-bottom: 10px; }
</style>

<h1>Ajouter un contenu</h1>

@if ($errors->any())
    <div class="error-msg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('contenus.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Titre :</label>
        <input type="text" name="titre" value="{{ old('titre') }}" required>
    </div>

    <div class="form-group">
        <label>Texte :</label>
        <textarea name="texte" rows="4">{{ old('texte') }}</textarea>
    </div>

    <div class="form-group">
        <label>Date de création :</label>
        <input type="date" name="date_creation" required>
    </div>

    <div class="form-group">
        <label>Date de validation :</label>
        <input type="date" name="date_validation">
    </div>

    <div class="form-group">
        <label>Statut :</label>
        <select name="statut">
            <option value="valide">Validé</option>
            <option value="attente">En attente</option>
        </select>
    </div>

    <div class="form-group">
        <label>Langue :</label>
        <select name="id_langue" required>
            @foreach($langues as $langue)
                <option value="{{ $langue->id_langue }}">{{ $langue->nom_langue }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Région :</label>
        <select name="id_region" required>
            @foreach($regions as $region)
                <option value="{{ $region->id_region }}">{{ $region->nom_region }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Type de contenu :</label>
        <select name="id_type_contenu" required>
            @foreach($types as $type)
                <option value="{{ $type->id_type_contenu }}">{{ $type->nom_contenu }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Auteur :</label>
        <select name="id_auteur" required>
            @foreach($utilisateurs as $u)
                <option value="{{ $u->id_utilisateur }}">{{ $u->nom }} {{ $u->prenom }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Modérateur :</label>
        <select name="id_moderateur" required>
            @foreach($utilisateurs as $u)
                <option value="{{ $u->id_utilisateur }}">{{ $u->nom }} {{ $u->prenom }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Contenu parent :</label>
        <select name="parent_id">
            <option value="">Aucun</option>
            @foreach($contenus as $c)
                <option value="{{ $c->id_contenu }}">{{ $c->titre }}</option>
            @endforeach
        </select>
    </div>

    <button class="submit-btn">Enregistrer</button>

</form>

@endsection
