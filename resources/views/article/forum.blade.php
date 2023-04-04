
@extends('layouts.app')

@section('content')
	<!-- Header avec une image de fond -->
	<header class="masthead" style="background-image: url('https://cdn.pixabay.com/photo/2015/03/26/09/54/city-690658_960_720.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Forum</h1>
						<span class="subheading">@lang('lang.forum_text')</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Contenu principal de la page -->
	<div class="container">
		<div class="row">
			<!-- Articles  -->
			<div class="col-lg-8 col-md-10 mx-auto">
                @foreach($articles as $article)
                 @php $lang = session()->get('locale') @endphp
				<div class="post-preview">
					<a href="{{ route('article.show', $article->id) }}">
                         @if ($lang == 'en')
						<h2 class="post-title text-danger">{{$article->title}}</h2>
						<h3 class="post-subtitle">{{$article->body}}</h3>
                        @else
                        <h2 class="post-title text-danger">{{$article->title_fr}}</h2>
						<h3 class="post-subtitle">{{$article->body_fr}}</h3>
                        @endif
					</a>
					<p class="post-meta">@lang('lang.publi')

                        @isset($article->articleHasUser)
                        {{$article->articleHasUser->name}},
                    @endisset
                     date: {{$article->created_at}}</p>
			</div>
			<hr>@endforeach

			<!-- Pagination -->
			{{$articles}}
		</div>
		<!-- Colonne de droite -->
		<div class="col-lg-4 col-md-4 mx-auto">

			<div class="card">
				<div class="card-body">
					<h4 class="card-title">@lang('lang.about')</h4>
					<p class="card-text">@lang('lang.about_text')</p>
				</div>
			</div>

			<br>
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">@lang('lang.Popular_Items')</h4>
					<ul class="list-group">
						<li class="list-group-item"><a href="#">@lang('lang.astuces')</a></li>
						<li class="list-group-item"><a href="#">@lang('lang.temps')</a></li>
						<li class="list-group-item"><a href="#">@lang('lang.examen')</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>




@endsection
