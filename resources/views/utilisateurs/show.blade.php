@extends('layout')

@section('title', 'Détails utilisateur')

@section('content')

<style>
.card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    max-width: 700px;
    margin: auto;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.profile-img {
    width:120px;height:120px;border-radius:50%;object-fit:cover;
}
.back-btn {
    background:#3498db;color:white;padding:10px 15px;border-radius:6px;
    text-decoration:none;
}
</style>

<div class="card">

    <h2>{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h2>

    <img src="{{ $utilisateur->photo }}" class="profile-img">

    <p><strong>Email :</strong> {{ $utilisateur->email }}</p>
    <p><strong>Sexe :</strong> {{ $utilisateur->sexe }}</p>
    <p><strong>Statut :</strong> {{ $utilisateur->statut }}</p>
    <p><strong>Date inscription : </strong> {{ $utilisateur->date_inscription }}</p>
    <p><strong>Date naissance : </strong> {{ $utilisateur->date_naissance }}</p>
    <p><strong>Rôle :</strong> {{ $utilisateur->role->nom_role ?? '-' }}</p>
    <p><strong>Langue :</strong> {{ $utilisateur->langue->nom_langue ?? '-' }}</p>

    <a href="{{ route('utilisateurs.index') }}" class="back-btn">← Retour</a>

</div>

@endsection
