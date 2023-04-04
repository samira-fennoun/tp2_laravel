@extends('layouts.app')

@section('content')
    <div class="container">
         @php $lang = session()->get('locale') @endphp
        <h1>@lang('lang.modifier')</h1>
        <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">@lang('lang.name')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $etudiant->name }}" >
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etudiant->adresse }}">
            </div>
            <div class="form-group">
                <label for="phone">@lang('lang.phone')</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $etudiant->phone }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }} " >
            </div>
            <div class="form-group">
                <label for="date_naissance">@lang('lang.brd')</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $etudiant->date_naissance }}">
            </div>
            <div class="form-group">
                <label for="ville_id">@lang('lang.city')</label>
                <select class="form-control" id="ville_id" name="ville_id">
                    @foreach($villes ?? '' as $ville)
                        <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">@lang('lang.update')</button>
        </form>
    </div>
@endsection
