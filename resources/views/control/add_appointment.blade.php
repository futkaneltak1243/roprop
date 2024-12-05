@extends('layouts.control')

@section('title', 'Add Appointment')

@section('control_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">New Appointment</h2>
        <form action="{{ route('appointment.add.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Full Name -->
            <label for="full_name" class="form-label">Full Name:</label>
            <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
            <br>

            <!-- Doctor Name (Dropdown) -->
            <label for="doctor_name" class="form-label">Doctor Name:</label>
            <select name="doctor_name" class="form-control" required>
                <option value="">Select a doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name . ' ' . $doctor->surname }}</option>
                @endforeach
            </select>
            <br>

            <!-- Condition -->
            <label for="condition" class="form-label">Condition:</label>
            <textarea name="condition" class="form-control" placeholder="Describe your condition" required></textarea>
            <br>

            <!-- Phone Number -->
            <label for="phone_number" class="form-label">Phone Number:</label>
            <input type="tel" name="phone_number" class="form-control" placeholder="Enter your phone number" " required>
                <br>

                <!-- Appointment Date -->
                <label for="appointment_date" class="form-label">Appointment Date:</label>
                <input type="datetime-local" name="appointment_date" class="form-control" required>
                <br>
                <script>
                    document.querySelector('input[name="appointment_date"]').addEventListener('input', function(e) {
                        const selectedDate = new Date(e.target.value);
                        if (selectedDate.getMinutes() % 20 !== 0) {
                            alert('Please select a time in 20-minute increments.');
                            e.target.value = ''; // Clear the invalid input
                        }
                    });
                </script>

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
