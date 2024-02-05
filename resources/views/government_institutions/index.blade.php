@extends('layouts.app')


@section('content')
  <div class="content-wrapper">

    <div class="container-fluid">
        <h1>Government Institutions List</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($governmentInstitutions as $institution)
                    <tr>
                        <td>{{ $institution->name }}</td>
                        <td>{{ $institution->category }}</td>
                        <td>
                            <a href="{{ route('government-institutions.show', ['government_institution' => $institution->id]) }}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{ route('government-institutions.edit', ['government_institution' => $institution->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('government-institutions.destroy', $institution->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('government-institutions.create') }}" class="btn btn-success mt-3">Create New Institution</a>
    </div>
  </div>
@endsection
