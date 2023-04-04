@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header text-center">
                    <h3>@lang('lang.Forgot_Password')</h3>
                </div>
                <form method="post">
                @csrf
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }}<br>
                            @endforeach
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                            <input type="submit" value="@lang('lang.send')" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
