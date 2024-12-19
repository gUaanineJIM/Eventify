<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('role');
})->name('role');

Route::get('/index', function () {
    return view('indexLanding');
})->name('indexLanding');

Route::get('create', function () {
    return view('events.create');
})->name('create');

Route::get('attendees', function () {
    return view('events.attendees');
})->name('attendees');

Route::get('events/manage', [EventController::class, 'show'])->name('events.ManageEvents');

Route::get('checkname', function () {
    return view('attendees.CheckName');
})->name('checkname');

Route::get('thankyou', function () {
    return view('attendees.Thankyou');
})->name('thankyou');


Route::get('/events/add-attendees', [EventController::class, 'addAttendeesForm'])->name('attendees');
Route::post('/events/add-attendees', [EventController::class, 'storeAttendee'])->name('events.addAttendees');
Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');

Route::post('checkname', [AttendeeController::class, 'checkName'])->name('checkname');
Route::put('attendees/{id}/rsvp', [AttendeeController::class, 'updateRsvp'])->name('updateRsvp');

Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/organizerdash', [EventController::class, 'index'])->name('home');

// Auth Routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Admin Auth Routes
Route::get('admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('admin/register', [AdminAuthController::class, 'register']);
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Event Routes
Route::resource('events', EventController::class);
Route::post('events/{event}/rsvp', [EventController::class, 'rsvp'])->name('events.rsvp');

// Attendees CRUD
Route::get('/attendees/{attendee}/edit', [AttendeeController::class, 'edit'])->name('attendees.edit');
Route::put('/attendees/{attendee}', [AttendeeController::class, 'update'])->name('attendees.update');
Route::delete('/attendees/{attendee}', [AttendeeController::class, 'destroy'])->name('attendees.destroy');

Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

