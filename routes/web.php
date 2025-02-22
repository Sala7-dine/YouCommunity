<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ParticipationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');
    
    // Routes pour les événements
    Route::resource('events', EventController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/events/{event}/participate', [ParticipationController::class, 'participate'])
        ->name('events.participate');
    Route::delete('/events/{event}/participate', [ParticipationController::class, 'cancel'])
        ->name('events.cancel-participation');

    Route::get('/discover', [EventController::class, 'discover'])->name('events.discover');

    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
});

require __DIR__.'/auth.php';
