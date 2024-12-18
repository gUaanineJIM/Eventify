@extends('layouts.app')

@section('content')
<div class="create-container">
    <h1 class="create-heading">Create New Event</h1>
    <form action="{{ route('events.store') }}" method="POST" class="create-form">
        @csrf
        <div class="create-form-group">
            <label for="title" class="create-label">Event Title</label>
            <input type="text" name="title" class="create-input" placeholder="Event Title" required><br>
        </div>
        <div class="create-form-group">
            <label for="description" class="create-label">Event Description</label>
            <textarea name="description" class="create-textarea" placeholder="Event Description" required></textarea><br>
        </div>
        <div class="create-form-group">
            <label for="event_date" class="create-label">Event Date</label>
            <input type="date" name="event_date" class="create-input" required><br>
        </div>
        <div class="create-form-group">
            <label for="location" class="create-label">Location</label>
            <input type="text" name="location" class="create-input" placeholder="Location" required><br>
        </div>
        <div class="create-form-group">
            <label for="category" class="create-label">Category</label>
            <input type="text" name="category" class="create-input" placeholder="Category" required><br>
        </div>
        <button type="submit" class="create-btn">Create Event</button>
    </form>
</div>
@endsection
