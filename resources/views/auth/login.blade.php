@extends('layouts.app')


@section('title', 'Login')


@section('content')

    <div class="container mt-5">
        <h2 class="text-center mb-4">Login</h2>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password"class="form-control" placeholder="Password" required><br>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
