@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editer un étudiant</h1>
        <form action="{{ route('villes.update', $ville->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $ville->nom }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
