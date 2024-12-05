@extends('layouts.control')

@section('title', 'Admins')

@section('control_content')
    <style>
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
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <div class="search-container">
        <form action="{{ route('admin.search') }}" method="GET">
            <input type="text" name="name" placeholder="Search..." required>
            <button type="submit">Search</button>
        </form>
    </div>
    <br>

    @foreach ($admins as $admin)
        <x-admin-card :name="$admin->name" :id="$admin->id"></x-admin-card>
    @endforeach
    <br>
@endsection
