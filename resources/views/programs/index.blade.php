@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Programs for {{ $governmentInstitution->name }}</h1>

        @if($programs->isEmpty())
            <p>No programs available for this government institution.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                        <tr>
                            <td>{{ $program->name }}</td>
                            <td>{{ $program->description }}</td>
                            <td>{{ $program->duration }}</td>
                            <td>
                                <a href="{{ route('programs.show', ['program' => $program->id]) }}" class="btn btn-success btn-sm">Show</a>
                                <a href="{{ route('programs.edit', ['program' => $program->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('programs.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Program</a>
    </div>
@endsection

