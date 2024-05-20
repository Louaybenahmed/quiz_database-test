<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <div class="container mt-5">
        <h1>Add Player</h1>
        <!-- Flash Message Section -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Form Section -->
        <form action="{{ route('player.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="userName">Username</label>
                <input type="text" class="form-control" id="userName" name="userName" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="score">Score</label>
                <input type="number" class="form-control" id="score" name="score" required>
            </div>
            <div class="form-group">
                <label for="gold">Gold</label>
                <input type="number" class="form-control" id="gold" name="gold" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajout</button>
        </form>
    </div>
</body>
</html>
