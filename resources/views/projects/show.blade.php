@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-5">
        <h1 style="font-size: 30px;">{{ $project->name }}</h1>

        <p style="font-size: 25px;"><strong>Description:</strong> {{ $project->description }}</p>
        <p style="font-size: 23px;"><strong>Cost:</strong> K{{ $project->cost }}</p>
        <p style="font-size: 25px;"><strong>Project Manager:</strong> {{ $project->project_manager }}</p>
        <p style="font-size: 25px;"><strong>Start Date:</strong> {{ $project->start_date }}</p>
        <p style="font-size: 25px;"><strong>Duration:</strong> {{ $project->duration }} months</p>

        @if ($project->stop_date)
            <p style="font-size: 25px;"><strong>Stop Date:</strong> {{ $project->stop_date }}</p>
        @endif

        <p style="font-size: 25px"><strong>Government Institution:</strong> {{ $governmentInstitution->name }}</p>

        <!-- Add more details as needed -->

        <div class="mt-4">
            <a href="{{ route('projects.edit',  ['project' => $project->id]) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('projects.index', [$governmentInstitution]) }}" class="btn btn-secondary ml-2">Back to Projects</a>
        </div>
    </div>
@endsection
