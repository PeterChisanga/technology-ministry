@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Projects for {{ $governmentInstitution->name }}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Descrition</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($governmentInstitution->projects->isEmpty())
                 <p>No projects available for this government institution.</p>
                @else
                <ul>
                    @foreach($governmentInstitution->projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </ul>
                @endif
            </tbody>
        </table>
        <a href="{{ route('projects.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Project</a>
    </div>
@endsection
