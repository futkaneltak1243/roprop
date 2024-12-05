@extends('layouts.control')

@section('control_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">New Doctor</h2>
        <form action="{{ route('doctor.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image_path" class="form-label">Profile image:</label>
            <input type="file" name="image_path" class="form-control" accept="image/*" placeholder="profile image"
                required><br>

            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="name" required><br>

            <label for="surname" class="form-label">Surname:</label>
            <input type="text" name="surname" class="form-control" placeholder="surname" required><br>

            <label for="specialty" class="form-label">Specialty:</label>
            <input type="text" name="specialty" class="form-control" placeholder="specialty" required><br>

            <label for="birth_date" class="form-label">Birth Date:</label>
            <input type="date" name="birth_date" class="form-control" placeholder="Select your birth date" required>
            <br>

            <label for="experience" class="form-label">Years of Experience:</label>
            <input type="number" name="experience" class="form-control" placeholder="Enter years of experience"
                min="0" step="1" required>
            <br>

            <label for="overview" class="form-label">Overview:</label>
            <textarea name="overview" class="form-control" placeholder="Enter an overview" rows="5" required></textarea>
            <br>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
