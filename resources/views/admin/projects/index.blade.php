
@extends('layouts.admin')

@section('content')

<div class="container py-2">
    <h1 class="text-white">Here are all the projects</h1>
    <table class="text-white table">
        <thead>
            <th>Name</th>
            <th>Descrizione</th>
            <th>Slug</th>
            <th>Commands</th>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->slug}}</td>
                <td class="text-center"><a href="{{route('admin.projects.show', ['project' => $project])}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
