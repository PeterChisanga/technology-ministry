@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-5">
        <h1>Create Annual Work Plan</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('annual_work_plans.store', [$governmentInstitution]) }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" required>
                @error('year')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Add more form fields as needed -->

            <button type="submit" class="btn btn-primary mt-3">Create Annual Work Plan</button>
        </form>
    </div>
@endsection
