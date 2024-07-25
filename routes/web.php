<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// routes/web.php

Route::redirect('/', '/gear-rentals');
 
// Redirige la raíz a la página de alquileres de equipo
Route::get('/', function () {
    return redirect('/gear-rentals');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // En routes/web.php o routes/api.php

});
// En routes/web.php o routes/api.php
Route::get('/gear-rentals/data', [GearRentalController::class, 'data'])->withoutMiddleware('auth')->name('gear-rentals.data');

require __DIR__.'/auth.php';


use App\Http\Controllers\GearRentalController;

Route::middleware(['auth'])->group(function () {
    Route::resource('gear-rentals', GearRentalController::class);
});

Route::get('/gear-rentals', [GearRentalController::class, 'index'])->name('gear-rentals.index');
// Ruta para obtener datos de alquileres de equipo
Route::get('/gear-rentals/data', [GearRentalController::class, 'data'])->name('gear-rentals.data');


Route::get('/profile', function () {
    return view('profile', [
        'user' => Auth::user() // Pasar el usuario autenticado al perfil
    ]);
})->middleware('auth'); // Asegura que solo los usuarios autenticados puedan acceder al perfil



use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);


use App\Http\Controllers\GearStockController;

Route::resource('gear-stock', GearStockController::class);


Route::get('/test-data', function () {
    return response()->json(['test' => 'success']);
});

