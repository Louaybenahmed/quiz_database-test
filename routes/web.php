    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PlayerController;

    Route::get('/player/create', [PlayerController::class, 'create'])->name('player.create');
    Route::post('/player', [PlayerController::class, 'store'])->name('player.store');

    Route::get('/', function () {
        return view('welcome');
    });
