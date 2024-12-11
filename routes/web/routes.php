<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

Route::get('/', static function (): Response {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group([], base_path(
    path: 'routes/web/auth.php',
));

Route::middleware(['auth'])->group(static function (): void {
    Route::middleware(['verified'])->group(static function (): void {
        Route::inertia('dashboard', 'Dashboard')->name('dashboard');

        Route::prefix('clients')->as('clients:')->group(base_path(
            path: 'routes/web/clients.php',
        ));

        Route::prefix('projects')->as('projects:')->group(base_path(
            path: 'routes/web/projects.php',
        ));
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
