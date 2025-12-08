@extends('layout')

@section('title', 'Modifier une langue')

@section('content')

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: bold; }
input, textarea {
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
.error-msg { color: red; margin-bottom: 10px; }
</style>

<h1>Modifier la langue</h1>

@if ($errors->any())
    <div class="error-msg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('langues.update', $langue->id_langue) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nom de la langue :</label>
        <input type="text" name="nom_langue" value="{{ $langue->nom_langue }}" required>
    </div>

    <div class="form-group">
        <label>Code langue :</label>
        <input type="text" name="code_langue" value="{{ $langue->code_langue }}" required>
    </div>

    <div class="form-group">
        <label>Description :</label>
        <textarea name="description" rows="4">{{ $langue->description }}</textarea>
    </div>

    <button class="submit-btn">Mettre à jour</button>
</form>

@endsection
