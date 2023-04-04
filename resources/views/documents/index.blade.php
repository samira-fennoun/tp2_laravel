@extends('layouts.app')

@section('content')
    <div class="container">
         @php $lang = session()->get('locale') @endphp
        <h1>@lang('lang.doc_list')</h1>
        <a href="{{ route('documents.create') }}" class="btn btn-success">@lang('lang.add')</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('lang.titre')</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                         @if ($lang == 'en')
                        <td>{{ $document->title_en }}</td>
                        @else
                        <td>{{ $document->title_fr }}</td>
                        @endif
                        <td>{{ $document->date }}</td>
                        <td>
                            <a href="{{ route('documents.show', $document->id) }}" class="btn btn-primary">@lang('lang.view')</a>
                            <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-secondary">@lang('lang.modifier')</a>
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">@lang('lang.delete')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
{{$documents}}
    </div>
@endsection
