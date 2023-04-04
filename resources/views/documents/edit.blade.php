@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier un document') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('documents.update', $document->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title', $document->title) }}" required autocomplete="title"
                                        autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ old('date', $document->date) }}" required autocomplete="date">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="language"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Langue') }}</label>

                                <div class="col-md-6">
                                    <select id="language" class="form-control @error('language') is-invalid @enderror"
                                        name="language" required>
                                        <option value="fr" @if (old('language', $document->language) == 'fr') selected @endif>
                                            {{ __('Français') }}</option>
                                        <option value="en" @if (old('language', $document->language) == 'en') selected @endif>
                                            {{ __('Anglais') }}</option>
                                    </select>

                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file"
                                    class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file"
                                        class="form-control-file @error('file') is-invalid @enderror" name="file"
                                        value="{{ old('file', $document->file) }}" required>

                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
