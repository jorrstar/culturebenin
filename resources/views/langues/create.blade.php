@extends('layout')

@section('title', 'Ajouter une langue')

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
    background: #2ecc71;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
}
.error-msg { color: red; margin-bottom: 10px; }
</style>

<h1>Ajouter une nouvelle langue</h1>

@if ($errors->any())
    <div class="error-msg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('langues.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nom de la langue :</label>
        <input type="text" name="nom_langue" value="{{ old('nom_langue') }}" required>
    </div>

    <div class="form-group">
        <label>Code langue :</label>
        <input type="text" name="code_langue" value="{{ old('code_langue') }}" required>
    </div>

    <div class="form-group">
        <label>Description :</label>
        <textarea name="description" rows="4">{{ old('description') }}</textarea>
    </div>

    <button class="submit-btn">Enregistrer</button>
</form>

@endsection
