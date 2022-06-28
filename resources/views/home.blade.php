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
                </div>
            </div>
        </div>
        @foreach($proyectosArray as $proyecto)
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item active">{{ $proyecto['tituloproy'] }}</li>
                    <li class="list-group-item">{{ $proyecto['presupuestoproy'] }}</li>
                    <li class="list-group-item">{{ $proyecto['vacantesproy'] }}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection
