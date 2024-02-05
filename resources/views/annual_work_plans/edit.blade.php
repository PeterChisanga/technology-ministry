@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">
        <h1>Edit Annual Work Plan</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- <form action="{{ route('annual_work_plans.update', ['annual_work_plan' => $annualWorkPlan->id, 'governmentInstitution' => $governmentInstitution->id]) }}" method="post"> --}}
        <form action="{{ route('annual_work_plans.update', ['annual_work_plan' => $annualWorkPlan->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $annualWorkPlan->name) }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $annualWorkPlan->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" name="year" class="form-control" value="{{ old('year', $annualWorkPlan->year) }}" required>
                @error('year')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Annual Work Plan</button>
        </form>
    </div>
@endsection
