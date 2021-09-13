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
                
                <form action="/coupon" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="coupon">Coupon</label>
                        <input type="coupon" name="coupon"
                        class="form-control @error('coupon') is-invalid @enderror" 
                        name="coupon" 
                        autofocus>

                        @error('coupon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Applica</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
