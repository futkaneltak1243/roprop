@extends('layouts.control')




@section('control_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">New Admin</h2>
        <form action="{{ route('admin.post') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="name" required><br>
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password"class="form-control" placeholder="Password" required><br>
            <br>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
