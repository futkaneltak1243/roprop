@extends('layouts.app')

@section('title', 'Doctor Profile')

@section('content')

    <body>


        <div class="doctor-profile">
            <div class="doctor-header">
                <img src="{{ Storage::url($doctor->image_path) }}" alt="{{ $doctor->name }} {{ $doctor->surname }}"
                    class="doctor-image">
                <h1 class="doctor-name">{{ $doctor->name }} {{ $doctor->surname }}</h1>
                <p class="doctor-specialty">{{ $doctor->specialty }}</p>
            </div>

            <div class="doctor-details">
                <p class="doctor-birth-date"><strong>Date of Birth:</strong> {{ $doctor->birth_date }}</p>
                <p class="doctor-experience"><strong>Years of Experience:</strong> {{ $doctor->experience }} years</p>

                <div class="doctor-overview">
                    <h2>About {{ $doctor->name }}</h2>
                    <p>{{ $doctor->overview }}</p>
                </div>
            </div>

            <div class="appointment-form">
                <h3>Book an Appointment</h3>
                <form action="{{ route('appointment.date', ['id' => $doctor->id]) }}" method="GET">
                    @csrf
                    <button type="submit" class="appointment-button">Book Now</button>
                </form>
            </div>
        </div>
    </body>


    <style>
        body {
            background-color: #201639;
        }

        .doctor-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            background-color: #f4f4f9;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
            font-family: 'Helvetica Neue', sans-serif;
        }

        .doctor-header {
            text-align: center;
            margin-bottom: 30px;
            width: 100%;
        }

        .doctor-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .doctor-name {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            text-transform: capitalize;
        }

        .doctor-specialty {
            font-size: 20px;
            color: #555;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .doctor-details {
            width: 100%;
            max-width: 800px;
            font-size: 18px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }

        .doctor-birth-date,
        .doctor-experience {
            margin: 12px 0;
        }

        .doctor-overview {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 2px solid #e0e0e0;
        }

        .doctor-overview h2 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #333;
        }

        .appointment-form {
            background-color: #fff;
            padding: 25px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            margin-top: 40px;
        }

        .appointment-form h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .appointment-button {
            padding: 12px 30px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .appointment-button:hover {
            background-color: #45a049;
        }
    </style>
@endsection
