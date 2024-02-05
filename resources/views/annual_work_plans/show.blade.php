@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        <h1>Annual Work Plan Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $annualWorkPlan->name }}</h5>
                <p class="card-text">Description: {{ $annualWorkPlan->description }}</p>
                <p class="card-text">Year: {{ $annualWorkPlan->year }}</p>
                <p style="font-size: 25px"><strong>Government Institution:</strong> {{ $governmentInstitution->name }}</p>


                <a href="{{ route('annual_work_plans.edit', ['annual_work_plan' => $annualWorkPlan->id]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('annual_work_plans.index', [$governmentInstitution]) }}" class="btn btn-secondary ml-2">Back to Annual Work Plan</a>
            </div>
        </div>
    </div>
@endsection
