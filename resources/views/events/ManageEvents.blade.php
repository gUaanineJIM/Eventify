@extends('layouts.app')

@section('title', 'Manage Events')

@section('header', 'Event List')

@section('content')
    <table id="MEEventTable">
        
        <tbody>
            @foreach ($events as $event)
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Event Date</th>
                <th>Location</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <tr class="MEEventRow">
                <td>{{ $event->id }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->category }}</td>
                <td>
                    <a href="{{ route('events.edit', $event->id) }}" class="MEEditLink">Edit Event</a>
                    
                </td>
            </tr>

            <!-- Attendees Table for each event -->
            <tr>
                <td colspan="7">
                    <table class="attendees-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>RSVP Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->attendees as $attendee)
                            <tr>
                                <td>{{ $attendee->name }}</td>
                                <td>{{ $attendee->rsvp_status }}</td>
                                <td>
                                    <a href="{{ route('attendees.edit', $attendee->id) }}" class="MEEditLink">Edit Name or RSVP?</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
