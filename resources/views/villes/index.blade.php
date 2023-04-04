@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des villes</h1>
        <a href="{{ route('villes.create') }}" class="btn btn-primary mb-3">Ajouter une ville </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($villes as $ville)
                    <tr>
                        <td>{{ $ville->nom }}</td>

                        <td>
                            <a href="{{ route('villes.edit', $ville) }}" class="btn btn-warning btn-sm">Editer</a>
                            <a href="{{ route('villes.show', $ville) }}" class="btn btn-info btn-sm">show</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $villes }}
    </div>
@endsection
