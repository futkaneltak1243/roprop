@extends('layouts.app')

@section('title', 'Control')

@section('content')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header */
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }

        /* Menu container */
        .menu {
            float: left;
            /* Aligns the menu to the left */
            width: 200px;
            background-color: #eee;
            height: 100vmax;
            /* Set the height to 100% of the viewport height */
            overflow-y: auto;
            border-right: 1px solid #ddd;
        }

        /* Menu links */
        .menu a {
            display: block;
            padding: 10px 15px;
            color: #777;
            text-decoration: none;
            border-bottom: 1px solid #ddd;
        }

        .menu h3 {
            text-align: center;
            padding: 10px;
            color: black;
        }

        .menu a:hover {
            background-color: rgb(177, 177, 177)
        }

        /* Main content */
        .content {
            margin-left: 200px;
            /* Same as the menu width */
            padding: 20px;
        }
    </style>
    <!-- Menu -->
    <div class="menu">
        <a href="{{ route('control') }}">Show doctors</a>
        <a href="{{ route('doctor.add') }}">Add a doctor</a>
        <a href="{{ route('appointments') }}">Show appointments</a>
        <a href="{{ route('appointments.add') }}">Add an appointment</a>
        <a href="{{ route('admins') }}">Show admins</a>
        <a href="{{ route('admin.add') }}">Add an admin</a>
    </div>

    <!-- Main Content -->
    @yield('control_content')
@endsection
