@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un Modèle de Contrat</h1>

        <form action="{{ route('modele_contrats.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du modèle :</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu du contrat :</label>
                <textarea name="contenu" class="form-control" rows="6" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
@endsection
