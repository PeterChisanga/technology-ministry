@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        <h1>{{ $program->name }}</h1>
        <p><strong>Description:</strong> {{ $program->description }}</p>
        <p><strong>Duration:</strong> {{ $program->duration }}</p>

        <a href="{{ route('programs.edit', ['program' => $program->id]) }}" class="btn btn-primary">Edit Program</a>

        <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Program</button>
        </form>

        <a href="{{ route('programs.index', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-secondary">Back to Programs</a>
    </div>
@endsection
