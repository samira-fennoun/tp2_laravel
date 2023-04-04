@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @php $lang = session()->get('locale') @endphp
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Detail</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><strong>@lang('lang.name')</strong></td>
                                <td>{{ $etudiant->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Adresse :</strong></td>
                                <td>{{ $etudiant->adresse }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('lang.phone')</strong></td>
                                <td>{{ $etudiant->phone }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email :</strong></td>
                                <td>{{ $etudiant->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('lang.brd')</strong></td>
                                <td>{{ $etudiant->date_naissance }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('lang.city')</strong></td>
                                <td>{{ $etudiant->ville->nom }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary">@lang('lang.modifier')</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
