@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questionario: {{ $survey->title }}</div>

                <div class="card-body">
                    <small>{{ $survey->description }}</small>
                    <div>{{ date('d/m/y H:m:s',strtotime($survey->created_at)) }}</div>
                    
                    <a href="/survey/{{ $survey->id }}/questions/create" class="btn btn-dark">Crea una nuova Domanda</a>
                <a href="/survey/take/{{ $survey->id.'-'.Str::slug($survey->title) }}" class="btn btn-info text-white">Compila il Questionario</a>
                </div>
            </div>

            @foreach ($survey->questions as $question)
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <div>{{ $question->question }} </div>
                    <div>{{ $question->responses->count() > 0 ? $question->responses->count() : 'Nessuna Risposta'  }}</div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @if (sizeof($question->answers) == 0)
                            <div class="text-danger">Nessuna opzione inserita</div>
                        @else    
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{ $answer->answer }}</div>
                                    @if($question->responses->count() > 0 )
                                    <div>{{ intval($answer->responses->count()*100/$question->responses->count()) }}%</div>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="card-footer">
                <form action="/survey/{{$survey->id}}/questions/{{ $question->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
