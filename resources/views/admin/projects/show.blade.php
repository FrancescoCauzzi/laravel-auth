@extends('layouts\admin')

@section('content')
<div class="container text-white">
    <h1 >{{ucfirst($project->name)}}</h1>
    <hr>
    <p>
        {{$project->description}}
    </p>

</div>

@endsection
