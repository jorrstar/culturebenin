@extends('layout')

@section('title', 'Détails du média')

@section('content')

<style>
.card { padding:20px; background:white; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
img { max-width:300px; border-radius:8px; }
</style>

<h1>Détails du média</h1>

<div class="card">

    <p><strong>ID :</strong> {{ $media->id_media }}</p>

    <p><strong>Description :</strong> {{ $media->description ?? '—' }}</p>

    <p><strong>Type de média :</strong>
        {{ $media->typeMedia->nom_media ?? '—' }}
    </p>

    <p><strong>Contenu associé :</strong>
        {{ $media->contenu->titre ?? '—' }}
    </p>

    <p><strong>Fichier :</strong></p>

    @if(preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->chemin))
        <img src="{{ asset($media->chemin) }}" alt="Image">
    @else
        <a href="{{ asset($media->chemin) }}" target="_blank">Télécharger / Ouvrir</a>
    @endif

</div>

<br>
<a href="{{ route('medias.index') }}" class="btn btn-primary">Retour</a>

@endsection
