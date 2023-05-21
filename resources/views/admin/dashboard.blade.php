@extends('layouts.admin')

@section('content')
<div class="container text-white">
    <h1>Admin dashboard</h1>
    <ul>
        <li>
            <a href="{{route('admin.projects.index')}}">Show me all the projects</a>

        </li>
    </ul>
</div>
@endsection
