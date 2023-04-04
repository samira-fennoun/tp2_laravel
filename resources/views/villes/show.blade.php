@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Détails de ville</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Nom :</strong></td>
                                <td>{{ $ville->nom }}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                    <a href="{{ route('villes.edit', $ville->id) }}" class="btn btn-primary">Modifier</a>
                    <a href="{{ route('villes.index') }}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
