@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le Modèle</h1>

        <form action="{{ route('modeles_contrats.update', $modeleContrat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-control" value="{{ $modeleContrat->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu :</label>
                <textarea name="contenu" class="form-control" rows="6" required>{{ $modeleContrat->contenu }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        </form>
    </div>
@endsection
