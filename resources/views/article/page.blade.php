@extends('layouts.app')
@section('title', 'Create')
@section('content')
<div class="container">
    <h1> article</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{$article->title}}</td>
                <td>@isset($article->articleHasUser)
                        {{$article->articleHasUser->name}}
                    @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles }}
</div>
@endsection
