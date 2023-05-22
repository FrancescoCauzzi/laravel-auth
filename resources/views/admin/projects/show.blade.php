@extends('layouts\admin')

@section('content')
<div class="container text-white d-flex flex-column gap-4">
    <h1 >{{ucfirst($project->name)}}</h1>
    <hr>
    <div class="__proj-description">
        <h4>Description</h4>
        <p>
            {{$project->description}}
        </p>
    </div>
    <div class="__proj-budget fw-bold">
        <h4>Budget: </h4>
        <span>{{$project->budget}} €</span>
    </div>
    <div class="__proj-timeline">
        <h4>The timeline of the project:</h4>
        <p class="fw-bold">
            <span >start: </span>
            <span>{{date("F j, Y", strtotime($project->start_date))}}</span><span>, until: </span><span>{{date("F j, Y", strtotime($project->end_date))}}</span>
        </p>
    </div>
    <div class="__proj__status">
        <h4>Status of the project:</h4>
        <span class="fw-bold">{{ucwords($project->status)}}</span>
    </div>
    <div class="__proj-manager">
    <h4>Manager:</h4>
    <span class="fw-bold">{{ $project->manager->name }}</span>
    </div>
    <div class="__proj-client">
        <h5>Client</h5>
        <span class="fw-bold">{{ $project->client->name }}</span>
    </div>
    <div class="__edit-btn">
        <button class="btn btn-primary"><a href="{{route('admin.projects.edit', ['project' => $project->slug])}}">Edit this project</a></button>
    </div>


</div>

@endsection
