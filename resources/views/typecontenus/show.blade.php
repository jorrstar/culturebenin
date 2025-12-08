@extends('layout')

@section('title', 'Détails type contenu')

@section('content')

<style>
.card {
    background:white; padding:20px; border-radius:8px;
    max-width:600px; margin:auto; box-shadow:0 2px 10px rgba(0,0,0,0.1);
}
.back-btn { background:#3498db; color:white; padding:10px 15px; border-radius:6px; text-decoration:none; }
</style>

<div class="card">
    <h2>{{ $type_contenu->nom_contenu }}</h2>

    <a href="{{ route('type_contenus.index') }}" class="back-btn">← Retour</a>
</div>

@endsection
