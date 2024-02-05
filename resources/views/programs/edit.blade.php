@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        <h1>Edit Program</h1>
        <!-- Add a form to update the program -->
        <form action="{{ route('programs.update', $program->id) }}" method="post">
            @csrf
            @method('PUT')

            <!-- Add form fields for program data -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $program->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control">{{ $program->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" name="duration" class="form-control" value="{{ $program->duration }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Program</button>
        </form>

        <a href="{{ route('programs.show', ['program' => $program->id]) }}" class="btn btn-secondary mt-3">Cancel</a>
    </div>
@endsection
