@extends('layouts.app')
@section('title', 'article List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                    <h1>Articles</h1>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($articles as $article)

                                <li><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></li>



                            @empty
                                <li>@lang('lang.art_msg')</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('article.create') }}" class="btn btn-success">@lang('lang.add')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
