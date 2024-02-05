@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <h1>Employee Details</h1>
        <!-- Display details of the selected employee -->
        <p>ID: {{ $employee->id }}</p>
        <p>Name: {{ $employee->first_name }} {{ $employee->last_name }}</p>
        <!-- Display more details as needed -->

        <a href="{{ route('employees.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection
