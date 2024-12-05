@extends('layouts.app')

@section('title', 'Date')

@section('content')
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: rgb(16, 16, 62);
            /* Same as your .hero-section background color */
        }

        .hero-section {


            height: 100vh;
            text-align: center;

            /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            position: relative;
        }
    </style>
    <section class="hero-section">

        <h2 class="text-center mb-4">New Appointment</h2>

        <form action="{{ route('appointment.make.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Full Name -->
            <label for="full_name" class="form-label">Full Name:</label>
            <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
            <br>

            <!-- Condition -->
            <label for="condition" class="form-label">Condition:</label>
            <textarea name="condition" class="form-control" placeholder="Describe your condition" required></textarea>
            <br>

            <!-- Phone Number -->
            <label for="phone_number" class="form-label">Phone Number:</label>
            <input type="tel" name="phone_number" class="form-control" placeholder="Enter your phone number" required>
            <br>

            <!-- Appointment Date -->
            <label for="appointment_date" class="form-label">Appointment Date:</label>
            <input type="datetime-local" name="appointment_date" class="form-control" required>
            <br>

            <input type="hidden" name="doctor_id" value="{{ $id }}">
            <input type="hidden" name="available_dates" value="{{ $available_dates }}">
            <button type="submit" class="btn btn-primary">Create</button>

        </form>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

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
        <br><br><br>
        <style>
            .table-container {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 30px;
            }

            table {
                width: 90%;
                max-width: 1200px;
                border-collapse: collapse;
                background-color: rgb(98, 102, 172);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
                font-size: 0.85rem;

            }

            th,
            td {
                padding: 8px 12px;
                text-align: center;
                border: 1px solid #000000;
                color: #000000;
            }

            th {
                background-color: #007bff;
                color: rgb(0, 0, 0);
                text-transform: uppercase;
                font-weight: bold;

            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            caption {
                margin-bottom: 10px;
                font-size: 1rem;
                font-weight: bold;
                color: #333;
            }

            .date-list {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 8px;
                padding: 0;
                margin: 0;
            }

            .date-list li {
                list-style: none;
                padding: 5px 10px;
                background-color: #3c3f7d;
                border-radius: 4px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }
        </style>
        </head>


        <h1>Available Appointments</h1>
        <div class="table-container">
            <table>
                <caption>Available Dates</caption>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($available_dates) as $index => $dateList)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>
                                <ul class="date-list">
                                    @foreach ($dateList as $date)
                                        <li>{{ $date }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
