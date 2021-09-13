@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <br>

                    <a class="btn btn-dark" href="/survey/create">Crea un nuovo questionario</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Questionari</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($surveys as $survey)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small>{{ date('d/m/y H:m:s',strtotime($survey->created_at)) }}</small>
                                        <h4>{{ $survey->title}}</h4>
                                        <p>{{ $survey->description}}</p>
                                    <a class="btn btn-dark" href="{{ $survey->link() }}">ENTER</a>
                                    </div>
                                    <div>
                                        <div class="text-info mt-4">Share Link</div>
                                        <a href="{{ $survey->publicUrl() }}">{{ $survey->publicUrl() }}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
