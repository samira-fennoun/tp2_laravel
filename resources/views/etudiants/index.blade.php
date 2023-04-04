@extends('layouts.app')

@section('content')
    <div class="container">
         @php $lang = session()->get('locale') @endphp
        <h1>Liste des étudiants</h1>
        <a href="{{ route('etudiants.create') }}" class="btn btn-primary mb-3">Ajouter un étudiant</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Ville</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->name }}</td>
                        <td>{{ $etudiant->adresse }}</td>
                        <td>{{ $etudiant->phone }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ $etudiant->date_naissance }}</td>
                        <td>{{ $etudiant->ville->nom }}</td>
                        <td>
                            <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-warning btn-sm">Editer</a>
                            <a href="{{ route('etudiants.show', $etudiant) }}" class="btn btn-info btn-sm">show</a>

                            {{-- <form action="{{ route('etudiants.destroy', $etudiant) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $etudiants }}
    </div>
@endsection
