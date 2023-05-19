@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_boolean">
            <img src="{{Vite::asset('resources/img/boolean-logo.png')}}" alt="">

        </div>
        <h1 class="display-5 fw-bold">
            Welcome to Boolfolio
        </h1>

        <p class="col-md-8 fs-4">This is a web application to manage projects</p>

    </div>
</div>

@endsection
