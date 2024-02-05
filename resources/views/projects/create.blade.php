@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
       <div class="container p-3">
         <h1>Create Project</h1>
        <form action="{{ route('projects.store', ['governmentInstitution' => $governmentInstitution]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="number" name="cost" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="project_manager">Project Manager:</label>
                <input type="text" name="project_manager" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration (in months):</label>
                <input type="number" name="duration" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="stop_date">Stop Date (optional):</label>
                <input type="date" name="stop_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Project</button>
        </form>
       </div>
    </div>
@endsection
