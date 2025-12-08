@extends('layout')

@section('title', 'Détails du contenu')

@section('content')

<style>
.details-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    max-width: 900px;
    margin: auto;
}

.details-title {
    font-size: 24px;
    font-weight: bold;
    color: #2c3e50;
}

.details-row {
    display: flex;
    margin-top: 15px;
}

.details-label {
    width: 180px;
    font-weight: bold;
    color: #34495e;
}

.details-value {
    flex: 1;
}

.badge {
    padding: 6px 10px;
    border-radius: 5px;
    color: white;
    font-size: 14px;
}
.badge-success { background: #27ae60; }
.badge-danger { background: #e74c3c; }

.back-btn {
    display: inline-block;
    margin-top: 20px;
    background: #3498db;
    padding: 10px 15px;
    color: white;
    border-radius: 6px;
    text-decoration: none;
}
.back-btn:hover { background: #2980b9; }
</style>

<div class="details-card">

    <div class="details-title">
        {{ $contenu->titre }}
    </div>

    <div class="details-row">
        <div class="details-label">Statut :</div>
        <div class="details-value">
            @if($contenu->statut == 'valide')
                <span class="badge badge-success">Validé</span>
            @else
                <span class="badge badge-danger">En attente</span>
            @endif
        </div>
    </div>

    <div class="details-row">
        <div class="details-label">Langue :</div>
        <div class="details-value">{{ $contenu->langue->nom_langue }}</div>
    </div>

    <div class="details-row">
        <div class="details-label">Région :</div>
        <div class="details-value">{{ $contenu->region->nom_region }}</div>
    </div>

    <div class="details-row">
        <div class="details-label">Type de contenu :</div>
        <div class="details-value">{{ $contenu->type->nom_contenu }}</div>
    </div>

    <div class="details-row">
        <div class="details-label">Auteur :</div>
        <div class="details-value">
            {{ $contenu->auteur->nom }} {{ $contenu->auteur->prenom }}
        </div>
    </div>

    <div class="details-row">
        <div class="details-label">Date de création :</div>
        <div class="details-value">{{ $contenu->datecreation }}</div>
    </div>

    @if($contenu->datevalidation)
    <div class="details-row">
        <div class="details-label">Date de validation :</div>
        <div class="details-value">{{ $contenu->datevalidation }}</div>
    </div>
    @endif

    @if($contenu->parentid)
    <div class="details-row">
        <div class="details-label">Parent :</div>
        <div class="details-value">Contenu #{{ $contenu->parentid }}</div>
    </div>
    @endif

    <div class="details-row">
        <div class="details-label">Texte :</div>
        <div class="details-value">
            <p>{{ $contenu->texte }}</p>
        </div>
    </div>

    <a href="{{ route('contenus.index') }}" class="back-btn">← Retour à la liste</a>
</div>
<h3>Ajouter un commentaire</h3>

<form action="{{ route('commentaires.store') }}" method="POST">
    @csrf

    <textarea name="message" required></textarea>
    <input type="hidden" name="id_contenu" value="{{ $contenu->id_contenu }}">

    <button type="submit">Envoyer</button>
</form>
<h3>Commentaires</h3>

@foreach($contenu->commentaires as $c)
    <div>
        <strong>{{ $c->utilisateur->nom }}</strong>
        <span>{{ $c->date_commentaire }}</span>
        <p>{{ $c->message }}</p>
    </div>
@endforeach

@endsection
