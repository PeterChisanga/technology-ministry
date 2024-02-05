@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <h1>{{ $governmentInstitution->name }}</h1>

            <!-- Display government institution details -->

            <h2>Projects</h2>
            @foreach($governmentInstitution->projects as $project)
                <!-- Display project details -->
                <p>{{ $project->name }}</p>
                <!-- Add more project details as needed -->
            @endforeach
            <a href="{{ route('projects.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Project</a>

            <h2>Annual Workplans</h2>
            @foreach($governmentInstitution->annualWorkplans as $workplan)
                <!-- Display workplan details -->
                <p>{{ $workplan->name }}</p>
                <!-- Add more workplan details as needed -->
            @endforeach
            <a href="{{ route('annual_work_plans.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Annual Workplan</a>

            <h2>Boards</h2>
            @foreach($governmentInstitution->boards as $board)
                <!-- Display board details -->
                <p>{{ $board->name }}</p>
                <!-- Add more board details as needed -->
            @endforeach
            <a href="{{ route('boards.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Board</a>

            <h2>Repository</h2>
            @foreach($governmentInstitution->repositories as $repositoryItem)
                <!-- Display repository item details -->
                <p>{{ $repositoryItem->name }}</p>
                <!-- Add more repository item details as needed -->
            @endforeach
            <a href="{{ route('repositories.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Repository Item</a>

            <h2>Programs</h2>
            @foreach($governmentInstitution->programs as $program)
                <!-- Display workplan details -->
                <p>{{ $program->name }}</p>
                <!-- Add more workplan details as needed -->
            @endforeach
            <a href="{{ route('programs.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Program</a>
        </div>
    </div>
@endsection
