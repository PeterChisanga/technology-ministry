@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container p-3">
                  <h1>Edit Project</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('projects.update', [ $project]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="number" name="cost" class="form-control" value="{{ old('cost', $project->cost) }}" required>
            </div>

            <div class="form-group">
                <label for="project_manager">Project Manager:</label>
                <input type="text" name="project_manager" class="form-control" value="{{ old('project_manager', $project->project_manager) }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $project->start_date) }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration (months):</label>
                <input type="number" name="duration" class="form-control" value="{{ old('duration', $project->duration) }}" required>
            </div>

            <div class="form-group">
                <label for="stop_date">Stop Date (optional):</label>
                <input type="date" name="stop_date" class="form-control" value="{{ old('stop_date', $project->stop_date) }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Project</button>
        </form>
        </div>
    </div>
@endsection
