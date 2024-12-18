@extends('layouts.app')

@section('content')
<div class="att-container">
    <h1 class="att-heading">Add Attendees to Events</h1>

    <!-- Form to Add Attendees -->
    <form action="{{ route('events.addAttendees') }}" method="POST" class="att-form">
        @csrf
        <div class="att-form-group">
            <label for="event_id" class="att-label">Select Event</label>
            <select class="att-select" id="event_id" name="event_id" required>
                <option value="">-- Choose Event --</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="att-form-group">
            <label for="attendee_name" class="att-label">Attendee Name</label>
            <input type="text" class="att-input" id="attendee_name" name="attendee_name" placeholder="Enter attendee name" required>
        </div>

        <button type="submit" class="att-btn">Add Attendee</button>
    </form>

    <!-- Attendees List -->
    <h2 class="att-subheading">Event Attendees</h2>
    <div id="attendees-list" class="att-list">
        @foreach($events as $event)
            <div class="att-event-card">
                <h3 class="att-event-title">{{ $event->title }}</h3>
                <table class="att-table">
                    <thead>
                        <tr>
                            <th>Attendee Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->attendees as $attendee)
                            <tr>
                                <td class="attendee-name">{{ $attendee->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($event->attendees->isEmpty())
                    <p class="att-empty">No attendees for this event.</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection

