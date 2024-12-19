@extends('layouts.app')

@section('content')
<h1>Upcoming Events</h1>

<!-- Search Bar Form -->
<form action="{{ route('events.index') }}" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search by title, Category, date, or location" value="{{ request()->get('search') }}" />
    <button type="submit" class="btn">Search</button>
</form>

@if(auth()->check() && auth()->user()->role == 'organizer')
    <a href="{{ route('events.create') }}" class="btn">Create New Event</a>
@endif

<div class="events-list">
    @foreach($events as $event)
        <div class="event-card">
            <div class="card-header">
                <h2>{{ $event->title }}</h2>
            </div>
            <div class="card-body">
                <p>{{ $event->description }}</p>
                <p><strong>Date:</strong> {{ $event->event_date }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Category:</strong> {{ $event->category }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('events.ManageEvents') }}">
                <button type="submit" class="rsvp-btn">VIEW RSVP</button>
                </a>
                        
            </div>
        </div>
    @endforeach
</div>
@endsection
