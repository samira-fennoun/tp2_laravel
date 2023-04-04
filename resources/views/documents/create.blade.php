@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-success">@lang('lang.add')</div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title_fr">Titre en français</label>
                            <input type="text" name="title_fr" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="title_en">Titre en anglais</label>
                            <input type="text" name="title_en" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="file">Fichier</label>
                            <input type="file" name="file" class="form-control-file" required accept=".pdf,.doc,.docx,.zip">
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
