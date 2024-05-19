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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Players list :</h1> <a href="#" onclick="scrollToDiv('div_add_player')" class="btn btn-primary">
        <i class="fas fa-user-plus"></i> add player
</a>
        <table class="table table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Score</th>
                    <th>Gold</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $players = DB::table('player')->get();
                @endphp
                @forelse ($players as $player)
                    <tr>
                        <td>{{ $player->id }}</td>
                        <td>{{ $player->userName }}</td>
                        <td>{{ $player->email }}</td>
                        <td>{{ $player->score }}</td>
                        <td>{{ $player->gold }}</td>
                        <td>
                            <form action="{{ route('player.delete', $player->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this player?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No players found.</td>
                    </tr>
                @endforelse

                @if(Session::has('success'))
                 <script>window.onload = function() {
                    alert("{{ Session::get('success') }}");
                 }
                 </script>
                @endif
            </tbody>
        </table>
    </div>
    <div id="div_add_player">
    <div class="container mt-5">
        <h1>Add Player</h1>
        <br><br>    
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
            <br><br>
            <button type="submit" class="btn btn-primary">Ajout</button>
        </form>
    </div>
    </div>
    <script>
        function scrollToDiv(divId) {
            var element = document.getElementById(divId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    </script>
</body>
</html>
