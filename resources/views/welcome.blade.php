<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #93e1d8);
        }
        .table-custom thead {
            background-color: #1e3d59;
            color: #ffffff;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #1e3d59;
            border-color: #1e3d59;
        }
        .btn-primary:hover {
            background-color: #163447;
            border-color: #163447;
        }
        .btn-danger {
            background-color: #e63946;
            border-color: #e63946;
        }
        .btn-danger:hover {
            background-color: #c53038;
            border-color: #c53038;
        }
        .card {
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            background-color: rgba(255, 255, 255, 0.4);
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        #div_add_player {
            margin-bottom: 100px;
        }
        .list, #div_add_player {
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.4);
        }
        .card-body {
            background-color: rgba(255, 255, 255, 0.4);
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .fixed-bottom-right {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            width: 350px;
            max-width: 350px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        button, label {
            font-family: Lilita One , sans-serif;
        }
    </style>
</head>
<body>
    <!-- Display Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger fixed-bottom-right" id="error-alert">
            <button type="button" class="close" onclick="closeAlert('error-alert')">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5 list">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-4" style="font-family: Lilita One , sans-serif;">Players list:</h1>
                <a href="#" onclick="scrollToDiv('div_add_player')" class="btn btn-primary mb-3" style="font-family: Lilita One , sans-serif;">
                    <i class="fas fa-user-plus"></i> Add Player
                </a>
                <table class="table table-custom table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Score</th>
                            <th>Gold</th>
                            <th>Actions</th>
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
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No players found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if(Session::has('success'))
                    <div class="alert alert-success fixed-bottom-right" id="success-alert">
                        <button type="button" class="close" onclick="closeAlert('success-alert')">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    <script>
                        window.onload = function() {
                            setTimeout(function() {
                                closeAlert('success-alert');
                            }, 4000); // Hide after 4 seconds
                        }
                    </script>
                @endif
            </div>
        </div>
    </div>

    <div id="div_add_player" class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 style="font-family: Lilita One , sans-serif;">Add Player</h1>
                <br><br>
                <!-- Form Section -->
                <form action="{{ route('player.store') }}" method="POST" class="form-container">
                    @csrf
                    <div class="form-group">
                        <label for="userName">Username</label>
                        <input type="text" class="form-control" id="userName" name="userName" value="{{ old('userName') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="score">Score</label>
                        <input type="number" class="form-control" id="score" name="score" value="{{ old('score') }}" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="gold">Gold</label>
                        <input type="number" class="form-control" id="gold" name="gold" value="{{ old('gold') }}" min="0" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function closeAlert(alertId) {
            var alertElement = document.getElementById(alertId);
            if (alertElement) {
                alertElement.style.display = 'none';
            }
        }

        window.onload = function() {
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    closeAlert('error-alert');
                }, 5000);
            }
        }

        function scrollToDiv(divId) {
            var div = document.getElementById(divId);
            div.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    </script>
</body>
</html>
