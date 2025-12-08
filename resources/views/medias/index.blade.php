@extends('layout')

@section('title', 'Liste des médias')

@section('content')

<style>
.table { width:100%; border-collapse: collapse; margin-top: 20px; }
.table th { background:#2c3e50; color:white; padding:10px; }
.table td { padding:10px; border-bottom:1px solid #ddd; }
.table tr:hover { background:#f8f8f8; }
.btn { padding:6px 12px; border-radius:6px; text-decoration:none; color:white; }
.btn-primary { background:#3498db; }
.btn-warning { background:#f1c40f; }
.btn-danger { background:#e74c3c; }
</style>

<h1>Gestion des médias</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('medias.create') }}" class="btn btn-primary">Ajouter un média</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Type</th>
            <th>Contenu associé</th>
            <th>Fichier</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($medias as $media)
        <tr>
            <td>{{ $media->id_media }}</td>

            <td>{{ $media->description ?? '—' }}</td>

            <td>{{ $media->typeMedia->nom_media ?? '—' }}</td>

            <td>{{ $media->contenu->titre ?? '—' }}</td>

            <td>
                @php
                    $file = 'storage/' . $media->chemin;
                @endphp

                {{-- Si c'est une image --}}
                @if(preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->chemin))
                    <img src="{{ asset($file) }}" width="60">
                @else
                    {{-- PDF, MP3, MP4, etc --}}
                    <a href="{{ asset($file) }}" target="_blank">Ouvrir</a>
                @endif
            </td>

            <td>
                <a href="{{ route('medias.show', $media->id_media) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('medias.edit', $media->id_media) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('medias.destroy', $media->id_media) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Supprimer ce média ?')">Supprimer</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

{{ $medias->links() }}

@endsection
