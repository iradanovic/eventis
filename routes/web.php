<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\EventTypeController;
use Illuminate\Support\Facades\Route;

use App\Models\Event;

Route::get('/', function () {
    $events = Event::with(['location', 'eventType', 'organizer'])->get();
    return view('welcome', compact('events'));
})->name('home');

// Routes for Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes for Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// Routes for Locations
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');

// Routes for Event Types
Route::get('/event-types', [EventTypeController::class, 'index'])->name('event_types.index');
