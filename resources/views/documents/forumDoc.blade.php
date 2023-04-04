@extends('layouts.app')

@section('content')
    <div class="container">
        @php $lang = session()->get('locale') @endphp
        <h1>@lang('lang.doc_list')</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('lang.titre')</th>
                    <th>Date</th>
                    <th>@lang('lang.auteur')</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                         @if ($lang == 'en')
                        <td>{{ $document->title_en }}</td>
                        @else
                        <td>{{ $document->title_fr }}</td>
                        @endif
                        <td>{{ $document->date }}</td>
                        <td> @isset($document->documentHasUser)
                        {{$document->documentHasUser->name}}
                    @endisset</td>
                        <td>
                            <a href="{{ asset('uploads/documents/' . $document->file) }}" download>Télécharger</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $documents }}
    </div>
@endsection
