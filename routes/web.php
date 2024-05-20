    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PlayerController;

    Route::get('/player/create', [PlayerController::class, 'create'])->name('player.create');
    Route::post('/player', [PlayerController::class, 'store'])->name('player.store');

    Route::delete('/player/{id}', [PlayerController::class, 'destroy'])->name('player.delete'); // Define delete route
    
    Route::get('/', [PlayerController::class, 'index'])->name('welcome');
    
    Route::get('/', function () {
        return view('welcome');
    });
