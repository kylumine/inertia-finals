<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\ProjectController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/portfolio', function () {
//     return Inertia::render('Portfolio');
// })->name('portfolio');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/portfolio', [AboutMeController::class, 'show'])->name('portfolio');
    Route::put('/portfolio/update', [AboutMeController::class, 'update'])->name('about-me.update');
});
// Route::get('/portfolio', [AboutMeController::class, 'show'])->name('portfolio');
// Route::put('/portfolio/update', [AboutMeController::class, 'update'])->name('about-me.update');

// Route::put('/portfolio', [AboutMeController::class, 'update'])->name('about-me.update');

Route::resource('/project', ProjectController::class);
Route::delete('/project/{project}', [ProjectController::class, 'destroy']);


require __DIR__.'/auth.php';
