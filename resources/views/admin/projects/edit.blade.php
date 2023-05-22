@extends('layouts/admin')

@section('content')
<div class="container py-3 __create-ctn text-white">
  <h1>Edit a project</h1>

  <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" class="py-5">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name">Name</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name') ?? $project->name}}">
      @error('name')

        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{old('description') ?? $project->description}}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="start_date">Start date</label>
      <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{old('start_date') ?? $project->start_date}}">
      @error('start_date')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
        <label for="end_date">End date</label>
        <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date')  ?? $project->end_date}}">
        @error('end_date')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="status">Status</label>
      <input class="form-control @error('status') is-invalid @enderror" type="text" name="status" id="status" value="{{old('status') ?? $project->status}}">
      @error('status')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="budget">Budget</label>
      <input class="form-control @error('budget') is-invalid @enderror" type="text" name="budget" id="budget" value="{{old('budget') ?? $project->budget}}">
      @error('budget')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-success fw-bold text-uppercase">Edit this Project</button>

  </form>


</div>

@endsection
