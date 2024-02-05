@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Annual Work Plans for {{ $governmentInstitution->name }}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($governmentInstitution->annualWorkPlans->isEmpty())
                    <p>No Annual Work Plans available for this government institution.</p>
                @else
                    @foreach($governmentInstitution->annualWorkPlans as $annualWorkPlan)
                        <tr>
                            <td>{{ $annualWorkPlan->name }}</td>
                            <td>{{ $annualWorkPlan->description }}</td>
                            <td>{{ $annualWorkPlan->year }}</td>
                            <td>
                                <a href="{{ route('annual_work_plans.show', ['annual_work_plan' => $annualWorkPlan->id]) }}" class="btn btn-success btn-sm">Show</a>
                                <a href="{{ route('annual_work_plans.edit', ['annual_work_plan' => $annualWorkPlan->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('annual_work_plans.destroy', $annualWorkPlan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a href="{{ route('annual_work_plans.create', ['governmentInstitution' => $governmentInstitution->id]) }}" class="btn btn-primary">Add Annual Work Plan</a>
    </div>
@endsection
