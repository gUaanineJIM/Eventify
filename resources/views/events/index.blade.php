@extends('layouts.app')

@section('content')
<h1>Upcoming Events</h1>

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
                @if(auth()->check() && auth()->user()->role == 'attendee')
                    <form action="{{ route('events.rsvp', $event->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="rsvp-btn">RSVP</button>
                        
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection