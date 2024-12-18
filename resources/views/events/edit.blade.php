<!-- resources/views/events/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Event')

@section('header', 'Edit Event')

@section('content')
<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $event->title }}" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ $event->description }}</textarea>
    </div>

    <div>
        <label for="event_date">Event Date</label>
        <input type="date" id="event_date" name="event_date" value="{{ $event->event_date }}" required>
    </div>
    <div>
        <label for="location">Location</label>
        <input type="text" id="location" name="location" value="{{ $event->location }}" required>
    </div>
    <div>
        <label for="category">Category</label>
        <input type="text" id="category" name="category" value="{{ $event->category }}" required>
    </div>

    <button type="submit">Update Event</button>
    
</form>
<form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')" class="MEDeleteButton">Delete</button>
    </form>
@endsection