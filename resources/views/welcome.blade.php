@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 bg-light rounded-3 __jumbo">
    <div class="container">
        <div class="logo_boolean">
            <img src="{{Vite::asset('resources/img/boolean-logo.png')}}" alt="">

        </div>
        <h1 class="display-5 fw-bold">
            Welcome to Boolfolio
        </h1>

        <p class="col-md-8 fs-4">This is a web application to manage IT projects</p>

    </div>
</div>

@endsection
