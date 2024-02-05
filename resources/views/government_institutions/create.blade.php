@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <h1 class="text-center">Create Government Institution</h1>
            <div class="col-md-6 offset-md-3 mt-3">
                <form action="/government-institutions/store" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required maxlength="200">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="Education Institution (TEVETA)">Education Institution (TEVETA)</option>
                            <option value="STI(science, technology and innovation)">STI(science, technology and innovation)</option>
                            <option value="State Company">State Company (eg. ZAMTEL, ZICTA, ZAMPOST)</option>
                        </select>
                        @error('category')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Institution</button>
                </form>
            </div>
        </div>
    </div>
@endsection
