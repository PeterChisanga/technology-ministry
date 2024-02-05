@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Employee List</h1>
        <!-- Add a table to display the list of employees -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <!-- Add more columns as needed -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the employees and display each row -->
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <!-- Add more columns as needed -->
                        <td>
                            <!-- Add action buttons (e.g., view, edit, delete) -->
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Add delete button with a form submission if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
