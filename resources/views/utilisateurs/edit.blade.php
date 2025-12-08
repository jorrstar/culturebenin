@extends('layout')

@section('title', 'Modifier utilisateur')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input, select {
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

<h1>Modifier un utilisateur</h1>

<form action="{{ route('utilisateurs.update', $utilisateur->id_utilisateur) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $utilisateur->nom }}" required>
    </div>

    <div class="form-group">
        <label>Prénom :</label>
        <input type="text" name="prenom" value="{{ $utilisateur->prenom }}" required>
    </div>

    <div class="form-group">
        <label>Email :</label>
        <input type="email" name="email" value="{{ $utilisateur->email }}" required>
    </div>

    <div class="form-group">
        <label>Mot de passe (laisser vide si inchangé):</label>
        <input type="password" name="mot_de_passe">
    </div>

    <div class="form-group">
        <label>Sexe :</label>
        <select name="sexe">
            <option value="M" @selected($utilisateur->sexe=='M')>Masculin</option>
            <option value="F" @selected($utilisateur->sexe=='F')>Féminin</option>
        </select>
    </div>

    <div class="form-group">
        <label>Date naissance :</label>
        <input type="date" name="date_naissance" value="{{ $utilisateur->date_naissance }}" required>
    </div>

    <div class="form-group">
        <label>Date inscription :</label>
        <input type="date" name="date_inscription" value="{{ $utilisateur->date_inscription }}" required>
    </div>

    <div class="form-group">
        <label>Statut :</label>
        <input type="text" name="statut" value="{{ $utilisateur->statut }}">
    </div>

    <div class="form-group">
        <label>Photo :</label>
        <input type="text" name="photo" value="{{ $utilisateur->photo }}">
    </div>

    <div class="form-group">
        <label>Rôle :</label>
        <select name="id_role">
            <option value="">Aucun</option>
            @foreach($roles as $role)
                <option value="{{ $role->id_role }}" 
                    @selected($utilisateur->id_role == $role->id_role)>
                    {{ $role->nom_role }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Langue :</label>
        <select name="id_langue">
            <option value="">Aucune</option>
            @foreach($langues as $l)
                <option value="{{ $l->id_langue }}" 
                    @selected($utilisateur->id_langue == $l->id_langue)>
                    {{ $l->nom_langue }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn-update">Mettre à jour</button>

</form>

@endsection
