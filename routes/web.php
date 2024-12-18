<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendeeController;

Route::get('/', function () {
    return view('indexLanding');
})->name('index');

// create event
Route::get('create', function () {
    return view('events.create');
})->name('create');

Route::get('attendees', function () {
    return view('events.attendees');
})->name('attendees');


//add attendees
Route::get('/events/add-attendees', [EventController::class, 'addAttendeesForm'])->name('attendees');
Route::post('/events/add-attendees', [EventController::class, 'storeAttendee'])->name('events.addAttendees');

// Home Route
Route::get('/organizerdash', [EventController::class, 'index'])->name('home');

// Auth Routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Event Routes
Route::resource('events', EventController::class);
Route::post('events/{event}/rsvp', [EventController::class, 'rsvp'])->name('events.rsvp');

// Admin Dashboard
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
