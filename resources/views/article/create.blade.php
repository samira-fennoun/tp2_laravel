@extends('layouts.app')
@section('title', 'Create')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    @lang('lang.add') article
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card">
                    <form  action="{{route('article.store')}}" method="post">
                        @csrf
                        <div class="card-header">
                             @lang('lang.form')
                        </div>
                        <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-tab-pane" type="button" role="tab" aria-controls="en-tab-pane" aria-selected="true">English</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr-tab-pane" type="button" role="tab" aria-controls="fr-tab-pane" aria-selected="false">Français</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="en-tab-pane" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                                <div class="col-12 mt-4">
                                    <label for="title"> @lang('lang.titre')</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="message">@lang('lang.contenu')</label>
                                    <textarea class="form-control" id="message" name="body"></textarea>
                                </div>

                                </div>
                        <div class="tab-pane fade" id="fr-tab-pane" role="tabpanel" aria-labelledby="fr-tab" tabindex="0">

                                <div class="col-12 mt-4">
                                    <label for="title_fr">@lang('lang.titre')</label>
                                    <input type="text" id="title_fr" name="title_fr" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="message_fr">@lang('lang.contenu')</label>
                                    <textarea class="form-control" id="message_fr" name="body_fr"></textarea>
                                </div>

                                </div>

                            </div>


                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.add')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection



