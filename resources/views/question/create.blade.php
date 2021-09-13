@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Crea una nuova Domanda</h4></div>

                <div class="card-body">
                   
                    <form action="/survey/{{ $survey->id }}/questions/create" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="exampleInputQuestion">Domanda</label>
                            <input type="text" value="{{ old('question.question') }}" class="form-control" 
                            id="exampleInputQuestion" 
                            name="question[question]" 
                            aria-describedby="questionHelp" placeholder="Inserisci la domanda...">
                            <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer1">Scelta 1</label>
                            <input type="text" name="answers[][answer]" value="" class="form-control">
                            @error('answers.0.answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer1">Scelta 2</label>
                            <input type="text" name="answers[][answer]" value="" class="form-control">
                            @error('answers.1.answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer1">Scelta 3</label>
                            <input type="text" name="answers[][answer]" value="" class="form-control">
                            @error('answers.2.answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-success">Salva</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
