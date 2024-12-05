@extends('layouts.app')


@section('title', 'Doctor')

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

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 7vh;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background-color: #fff;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 500px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: blue;
        }

        .hero-section {


            height: 100vh;
            text-align: center;
            /* Replace with your image path */
            background-size: cover;
            background-color: rgb(16, 16, 62);
            background-attachment: fixed;
            color: #fff;
            position: relative;
        }
    </style>
    <section class="hero-section">
        <h1>Choose Your Doctor</h1>
        <div class="search-container">
            <form action="/" method="GET">
                <input type="text" name="name" placeholder="Search..." required>
                <button type="submit">Search</button>
            </form>
        </div>
        @foreach ($doctors as $doctor)
            <x-rdoctor-card :name="$doctor->name" :specialty="$doctor->specialty" :experience="$doctor->experience" :photoUrl="Storage::url($doctor->image_path)" :id="$doctor->id" />
            <br>
        @endforeach
    </section>
@endsection
