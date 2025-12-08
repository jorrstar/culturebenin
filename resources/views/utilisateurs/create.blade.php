@extends('layout')

@section('title', 'Créer un utilisateur')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input, select {
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

<h1>Créer un utilisateur</h1>

<form action="{{ route('utilisateurs.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nom :</label>
        <input type="text" name="nom" required>
    </div>

    <div class="form-group">
        <label>Prénom :</label>
        <input type="text" name="prenom" required>
    </div>

    <div class="form-group">
        <label>Email :</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
    </div>

    <div class="form-group">
        <label>Sexe :</label>
        <select name="sexe">
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select>
    </div>

    <div class="form-group">
        <label>Date de naissance :</label>
        <input type="date" name="date_naissance" required>
    </div>

    <div class="form-group">
        <label>Date inscription :</label>
        <input type="date" name="date_inscription" required>
    </div>

    <div class="form-group">
        <label>Statut :</label>
        <input type="text" name="statut" required>
    </div>

    <div class="form-group">
        <label>Photo (URL) :</label>
        <input type="text" name="photo">
    </div>

    <div class="form-group">
        <label>Rôle :</label>
        <select name="id_role">
            <option value="">Aucun</option>
            @foreach($roles as $role)
                <option value="{{ $role->id_role }}">{{ $role->nom_role }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Langue :</label>
        <select name="id_langue">
            <option value="">Aucune</option>
            @foreach($langues as $l)
                <option value="{{ $l->id_langue }}">{{ $l->nom_langue }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn-save">Enregistrer</button>

</form>

@endsection
