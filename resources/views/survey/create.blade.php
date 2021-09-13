@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h4>Crea il tuo questionario</h4></div>

                <div class="card-body">
                  <form action="/survey/create" method="post">

                    @csrf

                    <div class="form-group">
                      <label for="exampleInputTitle">Titolo</label>
                      <input type="text" class="form-control" id="exampleInputTitle" name="title" aria-describedby="titleHelp" placeholder="Inserisci il titolo...">
                      <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>


                      @error('title')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror

                    </div>

                    <div class="form-group">
                      <label for="description">Descrizione</label>
                      <textarea rows="4" col="5" class="form-control" id="description" name="description"></textarea>

                      @error('description')
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
