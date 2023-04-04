@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $document->title }}</h1>
    <p>{{ $document->date }}</p>
    <p>{{ $document->language }}</p>
    <a href="{{ asset('uploads/documents/' . $document->file) }}" download>Télécharger</a>
</div>
@endsection
