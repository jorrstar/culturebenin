@extends('layout')

@section('title', 'Détails de la région')

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
.back-btn {
    background:#3498db; color:white;
    padding:10px 15px; border-radius:6px;
    text-decoration:none;
}
</style>

<div class="card">
    <h2>{{ $region->nom_region }}</h2>
    <p><strong>Description :</strong></p>
    <p>{{ $region->description_region }}</p>

    <a href="{{ route('regions.index') }}" class="back-btn">← Retour</a>
</div>

@endsection
