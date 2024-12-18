<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('role');
})->name('role');

Route::get('/index', function () {
    return view('indexLanding');
})->name('indexLanding');


// create event
Route::get('create', function () {
    return view('events.create');
})->name('create');

Route::get('attendees', function () {
    return view('events.attendees');
})->name('attendees');

Route::get('events/manage', [EventController::class, 'show'])->name('events.ManageEvents');

//check attendees name if presente on the entered name by the organizer
Route::get('checkname', function () {
    return view('attendees.CheckName');
})->name('checkname');

Route::get('thankyou', function () {
    return view('attendees.Thankyou');
})->name('thankyou');



//add attendees
Route::get('/events/add-attendees', [EventController::class, 'addAttendeesForm'])->name('attendees');
Route::post('/events/add-attendees', [EventController::class, 'storeAttendee'])->name('events.addAttendees');
Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
//rsvp
Route::post('checkname', [AttendeeController::class, 'checkName'])->name('checkname');
Route::put('attendees/{id}/rsvp', [AttendeeController::class, 'updateRsvp'])->name('updateRsvp');


//CRUD
Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');


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

//attendees crud
// Attendees CRUD
Route::get('/attendees/{attendee}/edit', [AttendeeController::class, 'edit'])->name('attendees.edit');
Route::put('/attendees/{attendee}', [AttendeeController::class, 'update'])->name('attendees.update');
Route::delete('/attendees/{attendee}', [AttendeeController::class, 'destroy'])->name('attendees.destroy');


