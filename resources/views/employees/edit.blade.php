@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <h1>Edit Employee</h1>
        <!-- Add a form to edit the selected employee -->
        <form action="{{ route('employees.update', $employee->id) }}" method="post">
            @csrf
            @method('put')
            <!-- Populate form fields with the existing employee data -->
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>

            <!-- Add more form fields as needed -->

            <button type="submit" class="btn btn-primary mt-3">Update Employee</button>
        </form>
    </div>
@endsection
