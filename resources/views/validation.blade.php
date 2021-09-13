@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mt-4">

                <div class="card-body">
            
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                    </div>
                @endif
                
                <form action="/validation" method="post">

                    @csrf

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        autofocus>

                        @error('password')
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
